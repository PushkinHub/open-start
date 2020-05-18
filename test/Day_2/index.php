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
    <link rel="stylesheet" href="style/css.css">
</head>
<body>

    <form action="includes/singin.php" method="post">
        <label for="login">Логин</label>
        <input id="login" type="text" name="login">
        <label for="password">Пароль</label>
        <input id="password" type="password" name="password">
        <button type="submit">Войти</button>

        <a href="register.php">Регистрация</a>

        <?php
            echo $_SESSION['massage'];
            unset($_SESSION['massage']);
        ?>
    </form>

</body>
</html>
