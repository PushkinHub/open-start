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
    $_SESSION['user_id'] = $user['id'];

    $response = [
        "status" => true
    ];
    echo json_encode($response);

} else {

    $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль'
    ];
    echo json_encode($response);

}
