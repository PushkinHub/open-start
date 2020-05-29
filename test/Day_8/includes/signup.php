<?php

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');

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

    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];
    echo json_encode($response);

} elseif ($login && $password && $password_confirm && $password !== $password_confirm) {

    $response = [
        "status" => false,
        "message" => "Пароли не совпадают!",
    ];
    echo json_encode($response);

} else {

    $response = [
        "status" => false,
        "message" => "Заполните все поля!",
    ];
    echo json_encode($response);

}
