<?php
define('ROOT_PATH', dirname(__DIR__)); // для файлов на сервере(абсолютный)
define('BASE_URL', '/ja/projectPHP/dziennik/'); // для браузера

function view($file){
    return ROOT_PATH  . '/view/' . $file;
}

function controller($file){
    return ROOT_PATH  . '/controllers/' . $file;
}
?>
