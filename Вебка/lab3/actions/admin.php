<?php

if (!(isset($_SESSION['user_type']))){
    header ('Location: new.php');
    exit();
}
else if(!(isset($_SESSION['user_type']) == 1)){
    header ('Location: new.php');
    exit();
}