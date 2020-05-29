<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
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
    <label for="new_login">Логин</label>
    <input id="new_login" type="text" name="new_login" value="<?= $_SESSION['user']['login'] ?>">
    <label for="old_password">Старый пароль</label>
    <input id="old_password" type="password" name="old_password">
    <label for="new_password">Новый пароль</label>
    <input id="new_password" type="password" name="new_password">
    <label for="password_confirm">Подтверждение пароля</label>
    <input id="password_confirm" type="password" name="password_confirm">
    <button class="edit" type="submit">Изменить</button>

    <a href="profile.php">В профиль</a>

    <p class="message hide"></p>
</form>

<script src="assets/js/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/js/main.js?<?=time()?>"></script>

</body>
</html>
