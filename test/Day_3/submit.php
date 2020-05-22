<?php

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

    $email = 'pushkin.sobaka@gmail.com';
    $theme = 'Новое сообщение';
    $headers = [
        'From' => 'Ревазов Данила',
        'Reply-To' => 'pushkin.sobaka@gmail.com',
        'X-Mailer' => 'PHP/' . phpversion()
    ];

    $letter = 'Данные сообщения:\r\n';
    $letter .= 'Имя:' . $_POST['name'] . ' \r\n';
    $letter .= 'Email:' . $_POST['email'] . ' \r\n';
    $letter .= 'Телефон:' . $_POST['phone'] . ' \r\n';
    $letter .= 'Сообщение:' . $_POST['message'] . ' \r\n';

    mail($email, $theme, $letter, $headers);

    echo 'Сообщение отправлено';
} else {
    echo 'Заполните все поля';
}
