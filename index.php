<?php

spl_autoload_register(function ($className) {
    $file = __DIR__ . '/' . $className . '.php';
    if (file_exists($file))
        require $file;
});

$data = array_slice(\App\Models\Article::findAll(), -3);
?>

    <h1>Головна сторінка</h1> <a style="color: darkblue; border: 2px solid orange" href="/kurs2/main/admin-panel.php">Адмін панель</a>
    <br>
<?php foreach ($data as $value): ?>
    <a href="/kurs2/main/article.php?id=<?php echo $value->id?>"><h3><?php echo $value->title ?></h3></a>
    <p>
        <?php echo $value->content ?>
    </p>
    <hr><br>
<?php endforeach; ?>