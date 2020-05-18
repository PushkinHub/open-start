<?php

session_start();
require_once 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

$sql = 'SELECT * FROM `users` WHERE `login` = :login';
$sth = $dbh->prepare($sql);
$sth->bindValue(':login', $login, PDO::PARAM_STR);
$sth->execute();
$user = $sth->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = ['login' => $user['login']];
    header('Location: ../profile.php');
} else {
    $_SESSION['massage'] = 'Не верный логин или пароль';
    header('Location: ../index.php');
}
