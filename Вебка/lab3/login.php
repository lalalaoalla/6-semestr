<?php
require_once 'helpers.php';
require_once 'header.php';
//require_once 'actions/admin.php';
?>
        <?php if (isset($_SESSION['message'])): ?>
            <label class="<?= $_SESSION['message-color']?>" for="user_name">
            <?=$_SESSION['message']?></label>
            <?php unset($_SESSION['message']);?>
            <?php endif;?>
        <form class="form" action="/actions/login.php" method="post">
            <div class="form-group col-md-6">
                <label for="user_name">Имя пользователя</label>
                <input type="text"
                name = "user_name" 
                class="form-control" 
                id="user_name" 
                aria-describedby="emailHelp" 
                placeholder="Например: lalalaoalla"
                value="<?php echo old(key: 'user_name') ?>"
                >
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Пароль</label>
                <input type="password" 
                name="password"
                class="form-control" 
                id="inputPassword4" 
                placeholder="Введите пароль">
            </div><br><br>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        У вас еще нет аккаунта? Тогда:
        <form action="registr.php">
            <input type="submit" class="btn btn-primary" value="Зарегистрироваться" />
        </form>
        <br><br><br><br>
        <?php require_once ('footer.php'); ?>       
    
</body>
</html>