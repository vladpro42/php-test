<?php

function uploadFile($file)
{
    $uploadDir = __DIR__ . '/uploads/';
    $uploadDir = './public/uploads/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadfile = $uploadDir . basename($file['name']);
    $fromPath = $file['tmp_name'];

    $isSuccess = move_uploaded_file($fromPath, $uploadfile);
    $isSuccess ? $image = $uploadfile : $image = '';
    return $image;
}