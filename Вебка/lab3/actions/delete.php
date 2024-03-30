<?php
require_once '../config/connect.php';
require_once '../helpers.php';


$id = $_GET['id'];
$stmt=$connect->prepare("DELETE FROM norm_news WHERE `norm_news`.`id`=?");
$stmt->bind_param("i", $id);
$stmt->execute();

redirect(path:'../new.php');