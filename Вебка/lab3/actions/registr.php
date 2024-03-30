<?php

require '../helpers.php';
require '../config/connect.php'; 



//создаем отдельные в отдельные переменные
$name = $_POST['name'];
$firstname = $_POST['firstname'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$email = $_POST['email'];



addLoadValue( 'name', $name);
addLoadValue( 'firstname', $firstname);
addLoadValue( 'user_name', $user_name);
addLoadValue( 'email', $email);

// проверка данных

$_SESSION['validation'] = [];

if (empty($name)){
    $_SESSION['validation']['name'] = 'Заполните имя';
}

if (empty($firstname)){
    $_SESSION['validation']['firstname'] = 'Заполните фамилию';
}

if (empty($user_name)){
    
    $_SESSION['validation']['user_name'] = 'Напишите имя пользователя';
}

if (empty($password)){
    $_SESSION['validation']['password'] = 'Вы забыли создать пароль';
}
if (!empty($_SESSION['validation'])){
    redirect(path: '../registr.php');

}
// хэшируем пароль
$password=md5($password);

$stmt = $connect->prepare("SELECT user_name FROM `us_test` WHERE user_name =?");
$stmt->bind_param("s",$user_name);
$stmt->execute();
$check_user=$stmt->get_result();

if ($check_user->num_rows > 0){
    $_SESSION['validation']['check_user'] = 'Такой пользователь уже существует';
    redirect(path:'../registr.php');
}
/*if(!empty($check_user)){
    $_SESSION['validation']['check_user'] = 'Такой пользователь уже существует';
    redirect(path:'../registr.php');
}*/




// Наконец-то мы делаем запрос на добавление нас! 
$stmt = $connect->prepare("INSERT INTO us_test(name, firstname,user_name,password,email) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss",$name, $firstname,$user_name,$password,$email);
$stmt->execute(); 


redirect(path:'../login.php');
