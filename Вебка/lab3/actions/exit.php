<?php

require_once '../config/connect.php';
unset($_SESSION ['id']);
unset($_SESSION ['user_name']);
unset($_SESSION ['user_type']);
header('Location: ../new.php');

?>