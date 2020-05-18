<?php

session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($login && $password && $password_confirm && $password === $password_confirm) {

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO `users` (`ID`, `login`, `password`) VALUES (NULL, :login, :hashed_password)';
    $sth = $dbh->prepare($sql);
    $sth->bindValue(':login', $login, PDO::PARAM_STR);
    $sth->bindValue(':hashed_password', $hashed_password, PDO::PARAM_STR);
    $sth->execute();

    $_SESSION['massage'] = 'Успешная регистрация';
    header('Location: ../index.php');
} elseif ($login && $password && $password_confirm && $password !== $password_confirm) {
    $_SESSION['massage'] = 'Пароли не совпадают';
    header('Location: ../register.php');
} else {
    $_SESSION['massage'] = 'Заполните все поля';
    header('Location: ../register.php');
}
