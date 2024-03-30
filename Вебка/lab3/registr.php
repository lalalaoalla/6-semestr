<?php
require_once 'helpers.php';
require_once 'config/connect.php';
require_once ('header.php');
//require_once 'actions/admin.php';

?>
        <form method="post" action="actions/registr.php">
        <?php getErrorMessage(fieldName: 'check_user'); ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="name">Имя
                <input type="text" 
                        name="name" 
                        class="form-control" 
                        id="name" 
                        placeholder="Введите имя"
                        value="<?php echo old(key: 'name') ?>"
                        >                        
                        
                </label>
                <small> <?php getErrorMessage(fieldName: 'name'); ?></small>
                </div>
                <div class="form-group col-md-6">
                <label for="firstname">Фамилия
                <input type="text" 
                        name="firstname" 
                        class="form-control" 
                        id="firstname" 
                        placeholder="Введите фамилию"
                        value="<?php echo old(key: 'firstname') ?>"
                        >

                </label>
                <small> <?php getErrorMessage(fieldName: 'firstname'); ?></small>
                </div>
            </div>
            <div class="form-group">
                <label for="user_name">Имя пользователя
                <input type="text" 
                        name="user_name" 
                        class="form-control" 
                        id="user_name" 
                        placeholder="Например: lalalaoalla"
                        value="<?php echo old(key: 'user_name') ?>"
                        >
                </label>
                <small> <?php getErrorMessage(fieldName: 'user_name'); ?></small>
            </div>
            <div class="form-group">
                <label for="inputPassword4">Пароль
                <input type="password" 
                        name="password" 
                        class="form-control" 
                        id="inputPassword4" 
                        placeholder="Введите пароль">
                </label>
                <small> <?php getErrorMessage(fieldName: 'password'); ?></small>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" 
                        name="email" 
                        class="form-control" 
                        id="email" 
                        placeholder="Введите почту"
                        value="<?php echo old(key: 'email') ?>"
                        >
               
                
                <small id="emailHelp" class="form-text text-muted">Не беспокойтесь, Ваши данные будут известны только нам.</small>
                </div>   
            </div> <br><br>
            <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" 
            data-bs-placement="top"
            data-bs-custom-class="custom-tooltip"
            data-bs-title="This top tooltip is themed via CSS variables.">Зарегистрироваться</button><br><br>
            
        </form>
        <?php clearValidaton(); ?>
       <?php require_once ('footer.php'); ?>
    </div>
</body>
</html>