<?php
session_start();
require_once 'connect.php';
$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];
$password_confirm = $_POST['password_confirm'];
$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");

if ( $password === $password_confirm){
    if (mysqli_num_rows($check_login) === 0){
        $password = md5($password);
        mysqli_query($connect, "INSERT INTO `users` (`id`, `login`,`name`, `password`) VALUES (NULL, '$login','$name', '$password')");
        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: auth.php' );
    }
    else{
        $_SESSION['message'] = 'Такой пользователь уже есть';
        header('Location: register.php' );
    }
}
else{
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: register.php' );
}
