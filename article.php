<?php

spl_autoload_register(function ($className) {
    $file = __DIR__ . '/' . $className . '.php';
    if (file_exists($file))
        require $file;
});

if(!empty($_GET['id'])){
    $data = \App\Models\Article::findById($_GET['id']);
    if(!empty($data)){
        var_dump($data);
    }
}