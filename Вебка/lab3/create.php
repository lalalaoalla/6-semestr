<?php
require_once 'config/connect.php';
require_once 'header.php';
require_once 'actions/admin.php';
?>

        <form action="actions/create.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-8">
                <label for="inputEmail4">Заголовок</label>
                <input type="text" class="form-control" id="text" name="title" >
                </div>
                <div class="form-group col-md-7">
                <label for="anonce">Текст анонса</label>
                <textarea type="textarea" class="form-control" id="anonce" name="anonce" rows = 4></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" 
                id="file" placeholder="Выберите файл" 
                name="image">
                <?php if(isset($_SESSION ['message'])) :?>
                <small class="<?=$_SESSION['message-color']?>"> 
                <?= $_SESSION ['message']; ?></small>
                <?php  unset($_SESSION ['message']);?>
                <?php endif;?>
            </div>
            <div class="form-group">
                <label for="full_text">Полный текст новости</label>
                <textarea type="textarea" class="form-control " 
                id="full_text" placeholder="Текст новости" name="full_text" rows=8> </textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="daaay">Дата</label>
                <input type="date" class="form-control" id="daaay" name="date">
                </div>
                <br>
            <button type="submit" class="btn btn-primary">Добавить новость</button>
            <br><br>
            </form>
            <br>
        <?php require_once ('footer.php'); ?>