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

    <form action="includes/signup.php" method="post">
        <label for="login">Логин</label>
        <input id="login" type="text" name="login">
        <label for="password">Пароль</label>
        <input id="password" type="password" name="password">
        <label for="password_confirm">Подтверждение пароля</label>
        <input id="password_confirm" type="password" name="password_confirm">
        <button type="submit">Зарегистрироваться</button>

        <a href="index.php">Авторизация</a>

        <?php
            echo $_SESSION['massage'];
            unset($_SESSION['massage']);
        ?>
    </form>

</body>
</html>
