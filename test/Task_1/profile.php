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
</head>
<body>

<div>
    <h5>Добро пожаловать!</h5>
    <p><?= $_SESSION['user']['login'] ?></p>
    <a href="edit.php">Редактировать данные</a><br>
    <a href="includes/logout.php">Выход</a>
</div>

</body>
</html>
