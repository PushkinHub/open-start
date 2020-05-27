<?php

use Spatie\SimpleExcel\SimpleExcelWriter;

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

require_once 'connect.php';
require_once 'vendor/autoload.php';

$format = $_GET['format'];

$sql = 'SELECT * FROM `articles`';
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetch(PDO::FETCH_ASSOC);

$writer = SimpleExcelWriter::streamDownload('new_file.' . $format);

foreach ($rows as $row) {
    $writer->addRow($row);
}

$writer->toBrowser();
