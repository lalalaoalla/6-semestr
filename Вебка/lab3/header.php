<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Привет, медведь!</title>
    <link rel="stylesheet" href="reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="style.css">
</head>



<body class="body">
    <div class="container">
        <nav class="navbar d-flex justify-content-between mb-2">
            
                <nav class="navbar navbar-light">
                    <a class="navbar-brand d-flex align-items-end" href="new.php">
                        <h2 class="navbar-logo">Хозяева Арктики</h2>
                    </a>
                </nav> 
                <ul class="nav nav-underline d-flex gap-3">
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_name'])):?>
                        <a class="nav-link fs-5 fw-bold text-info" href="#"><?php print_r($_SESSION['user_name']);?></a>   
                        <?php endif;?> 
                    </li>
                    <li class="nav-item">
                    <?php
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1):
            ?>
                        <a class="nav-link fs-5 fw-bold text-success" href="create.php">Добавить новость</a>   
                        <?php endif;?> 
                    <li class="nav-item">
                        <a class="nav-link active fs-5 fw-bold  text-reset" aria-current="page" href="new.php">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 fw-bold text-reset" href="info.php">Наши контакты</a>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_name'])):?>
                        <a class="nav-link fs-5 fw-bold text-reset" href="actions/exit.php">Выйти</a>
                        <?php  else :?>
                        <a class="nav-link fs-5 fw-bold text-reset" href="login.php">Вoйти</a>   
                        <?php endif;?> 
                    </li>

                </ul>     
        </nav>