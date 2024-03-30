<?php
require_once '../config/connect.php';
require_once '../helpers.php';

// сначала все ка кобычно, делим пост запрос
$title = $_POST['title'];
$anonce = $_POST['anonce'];
$image = $_FILES['image'];
$full_text = $_POST['full_text'];
$date = date("Y-m-d", strtotime($_POST['date']));

//спрашиваем про id картинки

$stmt = $connect->prepare("SELECT image FROM norm_news WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

$res= $stmt->get_result();

$news=mysqli_fetch_assoc($res);

$name = $news['image'];

// проверка, если наше поле не пустое, то сверяем его так же, как и при добавлении

if (!($image['name'] == '')) {
    if ($_FILES['image']['size'] > 3 * 1024 * 1024) {
        $_SESSION['message'] = 'Файл слишком большой, пожалуйста, выберите другой';
        $_SESSION['message-color'] = 'text-danger';
        redirect(path: '../create.php');
    }

    // массив кусков
    $pie = explode('.', $image['name']);



    // берем последнюю часть после точки

    $end = end($pie);
    //массив с типами
    $my_array = array('jpg', 'png', 'jpeg');

    if (!(in_array($end, $my_array))) {
        $_SESSION['message'] = 'Неправильное расширение файла, пожалуйста, выберите файл с расширением jpg/jpeg/png';
        $_SESSION['message-color'] = 'text-danger';
        redirect(path: '../create.php');
    }

    // задаем имя фотографии
    $name = 'photos/' . rand(1, 1000) . $image['name'];

    copy($image['tmp_name'], '../' . $name);


}


//отправляем запрос на изменение

$id = isset($_GET['id']) ? intval($_GET['id']) : 1;// получаем id новости
$stmt = $connect->prepare("UPDATE `norm_news` SET `title` =?, `anonce` =?, `image` = ?, `full_text` = ?, `date` = ? WHERE `norm_news`.`id` =?");
$stmt->bind_param("sssssi", $title, $anonce, $name, $full_text, $date,$id);
$stmt->execute();





redirect(path: '../main_new.php?id='.$id);
