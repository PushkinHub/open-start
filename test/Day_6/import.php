<?php

use Spatie\SimpleExcel\SimpleExcelReader;

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

require_once 'connect.php';
require_once 'vendor/autoload.php';


$uploadfile = __DIR__.'/tmp/'.$_FILES['userfile']['name'];

if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Возможная атака с помощью файловой загрузки!";
}

SimpleExcelReader::create($uploadfile)->getRows()
    ->each(function(array $data) use ($dbh) {

        $sql = '
            INSERT INTO `articles` (`id`, `article`, `model`, `price`, `count`) 
            VALUES (NULL, :article, :model, :price, :count)
            ON DUPLICATE KEY UPDATE
            `model` = :model, `price` = :price, `count` = :count
            ';
    $sth = $dbh->prepare($sql);
    $sth->bindValue(':article', $data['article'], PDO::PARAM_STR);
    $sth->bindValue(':model', $data['model'], PDO::PARAM_STR);
    $sth->bindValue(':price', $data['price'], PDO::PARAM_STR);
    $sth->bindValue(':count', $data[ 'count'], PDO::PARAM_STR);
    $sth->execute();
    });


unlink($uploadfile);
echo 'Успешный импорт';



// Альтернативный способ записи

//$file = fopen("articles.csv", 'r');
//
//while($data = fgetcsv($file, 1000,";")) {
//
//    $sql = '
//            INSERT INTO `articles` (`id`, `article`, `model`, `price`, `count`)
//            VALUES (NULL, :article, :model, :price, :count)
//            ON DUPLICATE KEY UPDATE
//            `model` = :model, `price` = :price, `count` = :count
//            ';
//    $sth = $dbh->prepare($sql);
//    $sth->bindValue(':article', $data[0], PDO::PARAM_STR);
//    $sth->bindValue(':model', $data[1], PDO::PARAM_STR);
//    $sth->bindValue(':price', $data[2], PDO::PARAM_STR);
//    $sth->bindValue(':count', $data[3], PDO::PARAM_STR);
//    $sth->execute();
//}
//
//fclose($file);
