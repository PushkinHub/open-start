<?php

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf', 'bmp'];

    $fileExtension = explode('.', $fileName);
    $fileActualExtension = strtolower(end($fileExtension));

    if (in_array($fileActualExtension, $allowedExtensions)) {

            $image = new Imagick($fileTmpName);

            firstFile($image, $fileActualExtension);
            secondFile($image, $fileActualExtension);

            header('Location: index.php?successfully');
    }

}

function firstFile(Imagick $image, $fileActualExtension) {

    $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
    $uploadFile = 'uploads500x300/' . $fileNameNew;

    $max_width  = 500;
    $max_height = 300;

    $image->resizeImage(
        min($image->getImageWidth(),  $max_width),
        min($image->getImageHeight(), $max_height),
        imagick::FILTER_CATROM,
        1,
        true
    );

    $watermark = new Imagick();
    $watermark->readImage("watermark.png");

    $watermarkResizeFactor = 3;

    $img_Width = $image->getImageWidth();
    $img_Height = $image->getImageHeight();
    $watermark_Width = $watermark->getImageWidth();
    $watermark_Height = $watermark->getImageHeight();

    $watermark->scaleImage($watermark_Width / $watermarkResizeFactor, $watermark_Height / $watermarkResizeFactor);

    $watermark_Width = $watermark->getImageWidth();
    $watermark_Height = $watermark->getImageHeight();

    $x = ($img_Width - $watermark_Width);
    $y = ($img_Height - $watermark_Height);

    $watermark->setImageAlpha(0.3);

    $image->compositeImage($watermark, Imagick::COMPOSITE_OVER, $x, $y);

    $image->writeImage($uploadFile);
}

function secondFile(Imagick $image, $fileActualExtension) {

    $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
    $uploadFile = 'uploads150x150/' . $fileNameNew;

    $image->cropThumbnailImage(150,150);
    $image->writeImage($uploadFile);
}
