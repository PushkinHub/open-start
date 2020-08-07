<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<form>
    <label for="first-name">Имя</label>
    <input id="first-name" type="text" name="first-name">
    <label for="second-name">Фамилия</label>
    <input id="second-name" type="text" name="second-name">
    <label for="email">Ваша почта</label>
    <input id="email" type="text" name="email">
    <label for="login">Логин</label>
    <input id="login" type="text" name="login">
    <label for="password">Пароль</label>
    <input id="password" type="password" name="password">
    <label for="password_confirm">Подтверждение пароля</label>
    <input id="password_confirm" type="password" name="password_confirm">
    <button class="reg" type="submit">Зарегестрироваться</button>

    <a href="index.php">Авторизация</a>

    <p class="message hide"></p>
</form>

<script src="assets/js/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/js/main.js?<?=time()?>"></script>

</body>
</html>
