<?php
require_once('../config/connect.php');
require_once('../helpers.php');

$user_name = $_POST['user_name'];
$password = $_POST['password'];

$password=md5($password);

// проверка на то, что такой пользоватль есть
$stmt = $connect->prepare("SELECT user_name, password, user_type FROM `us_test` WHERE user_name =? AND password=?");
$stmt->bind_param("ss",$user_name,$password);
$stmt->execute();
$check_user=$stmt->get_result();


//проверка на верность логина
if($check_user->num_rows ==0){
    $_SESSION['message'] = 'Неверный логин или пароль';
    $_SESSION['message-color'] = 'text-danger';
    redirect( path: '../login.php');
}
// сессия для пользователя
$user = mysqli_fetch_assoc($check_user);
$_SESSION = [
    'id' => $user["id"],
    'user_name' => $user["user_name"],
    'user_type' => $user["user_type"],
];
redirect(path:'../new.php');

?>
