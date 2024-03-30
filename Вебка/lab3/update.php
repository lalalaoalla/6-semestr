<?php
require_once 'config/connect.php';
//передаем id новости
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

$stmt = $connect->prepare("SELECT * FROM norm_news WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

//находи новость и заносим ее в переменную

$result=$stmt->get_result();

$update=mysqli_fetch_assoc($result);

require_once 'header.php';
require_once 'actions/admin.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global news</title>
    <link rel="stylesheet" href="reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="style.css">
</head>
        <form action="actions/update.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-8">
                <label for="inputEmail4">Заголовок</label>
                <input type="text" class="form-control" id="text" name="title" value="<?= $update['title'];?>">
                </div>
                <div class="form-group col-md-7">
                <label for="anonce">Текст анонса</label>
                <textarea type="textarea" class="form-control" id="anonce" name="anonce" rows = 4><?= $update['anonce'];?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" 
                id="file" placeholder="Выберите файл" 
                name="image" value="<?= $update['image'];?>">
                <?php if(isset($_SESSION ['message'])) :?>
                <small class="<?=$_SESSION['message-color']?>"> 
                <?= $_SESSION ['message']; ?></small>
                <?php  unset($_SESSION ['message']);?>
                <?php endif;?>
            </div>
            <div class="form-group">
                <label for="full_text">Полный текст новости</label>
                <textarea type="textarea" class="form-control " 
                id="full_text" placeholder="Текст новости" name="full_text" rows=8 > <?= $update['full_text'];?></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="daaay">Дата</label>
                <input type="date" class="form-control" id="daaay" name="date" value="<?= $update['date'];?>">
                </div>
                <br>
            <button type="submit" class="btn btn-info border-info text-light ">Редактировать</button>
            <br><br>
            </form>
            <br>
        <?php require_once 'footer.php'?>
        