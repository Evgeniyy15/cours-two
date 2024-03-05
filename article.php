<?php

spl_autoload_register(function ($className) {
    $file = __DIR__ . '/' . $className . '.php';
    if (file_exists($file))
        require $file;
});

if (!empty($_GET['id'])) {
    $data = \App\Models\Article::findById($_GET['id']);
    if (!empty($data)) { ?>

        <h1>Сторінка новини</h1>
        <br>
        <h3><?php echo $data->title ?></h3>
        <p>
            <?php echo $data->content ?>
        </p>
        <hr><br>

    <?php }
}