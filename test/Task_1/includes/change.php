<?php

session_start();
require_once 'connect.php';

$oldPassword = $_POST['old_password'];
$newPassword = $_POST['new_password'];
$passwordConfirm = $_POST['password_confirm'];

$sql = 'SELECT * FROM `users` WHERE `id` = :user_id';
$sth = $dbh->prepare($sql);
$sth->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$sth->execute();
$user = $sth->fetch(PDO::FETCH_ASSOC);

$oldLogin = $user['login'];
$newLogin = $_POST['new_login'] ?: $oldLogin;

if ($newPassword === $passwordConfirm && $user && password_verify($oldPassword, $user['password'])) {

    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = 'UPDATE `users`
            SET `login` = :new_login, `password` = :new_password
            WHERE `id` = :user_id';
    $sth = $dbh->prepare($sql);
    $sth->bindValue(':new_login', $newLogin, PDO::PARAM_STR);
    $sth->bindValue(':new_password', $newPassword, PDO::PARAM_STR);
    $sth->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $sth->execute();

    $response = [
        "status" => true
    ];

} else {

    $response = [
        "status" => false,
        "message" => 'Данные введены не верно!'
    ];

}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
