<?php
require_once '../config/connect.php';
require_once '../helpers.php';
$title = $_POST['title'];
$anonce = $_POST['anonce'];
$image = $_FILES['image'];
$full_text = $_POST['full_text'];
$date = date("Y-m-d", strtotime($_POST['date']));

//var_dump($_FILES);

if($_FILES['image']['size'] > 3*1024*1024)
{
    $_SESSION['message'] = 'Файл слишком большой, пожалуйста, выберите другой';
    $_SESSION['message-color'] = 'text-danger';
    redirect(path: '../create.php');
}

// массив кусков
$pie=explode('.', $image ['name']);

// берем последнюю часть после точки

$end = end($pie);
//массив с типами
$my_array = array('jpg', 'png', 'jpeg');

if(!(in_array($end, $my_array))){
    $_SESSION['message'] = 'Неправильное расширение файла, пожалуйста, выберите файл с расширением jpg/jpeg/png';
    $_SESSION['message-color'] = 'text-danger';
    redirect(path: '../create.php');
}

// задаем имя фотографии
$name = 'photos/'.rand(1,1000).$image['name'];
copy($image['tmp_name'], '../'.$name);

$stmt = $connect->prepare("INSERT INTO norm_news(title, anonce,image,full_text,date) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss",$title, $anonce,$name,$full_text,$date);
$stmt->execute();

redirect(path: '../new.php');
?>