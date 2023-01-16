<?php
session_start();
if ($_SESSION['user']){
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="style.auth.css">
</head>
<body>

<! -- Форма регистрации -->

<form action="signup.php" method="post">
    <div class="container">
        <h1 class="aut">Регистрация</h1>
        <p class="aut">Пожалуйста заполните эту форму для регистрации</p>
        <hr>

        <label for="Логин">
            <b>Логин</b>
        </label>
        <input type="text" name="login"  placeholder="Введите ваш логин" required>
        <hr>

        <label for="Имя">
            <b>Имя</b>
        </label>
        <input type="text" name="name"  placeholder="Введите ваше имя" required>
        <hr>

        <label for="Пароль">
            <b>Пароль</b>
        </label>
        <input type="password" name="password" placeholder="Введите ваш пароль" required>

        <label for="Повторите пароль">
            <b>Подтвердите пароль</b>
        </label>
        <input type="password" name="password_confirm" placeholder="Подтвердите ваш пароль" required>
        <hr>

        <button type="submit" class="btn">Зарегистрироваться</button>

        <p class="aut"> Есть аккаунт? - <a href="auth.php">Авторизируйтесь</a>.</p>

        <?php
        if ($_SESSION['message']){
            echo '<p class="msg"> ' . $_SESSION['message'] . '  </p>';
        }
        unset($_SESSION['message']);
        ?>

    </div>
</form>
</body>
</html>