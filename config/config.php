<?php
session_start();
define('ROOT_PATH', dirname(__DIR__)); // для файлов на сервере(абсолютный) для PHP C:\xampp\htdocs\ja\projectPHP\dziennik/assets/
define('BASE_URL', '/ja/projectPHP/dziennik/'); // для браузера js css

function view($file){
    return ROOT_PATH  . '/view/' . $file;
}

function controller($file){
    return ROOT_PATH  . '/controllers/' . $file;
}

function helpers($file){
    return ROOT_PATH  . '/helpers/' . $file;
}