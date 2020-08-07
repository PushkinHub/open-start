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
    <label for="login">Логин</label>
    <input id="login" type="text" name="login">
    <label for="password">Пароль</label>
    <input id="password" type="password" name="password">
    <button class="aut" type="submit">Войти</button>

    <a href="register.php">Регистрация</a>

    <p class="message hide"></p>
</form>

<script src="assets/js/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/js/main.js?<?=time()?>"></script>

</body>
</html>
