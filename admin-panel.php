<?php

spl_autoload_register(function ($className) {
    $file = __DIR__ . '/' . $className . '.php';
    if (file_exists($file))
        require $file;
});

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['delete-article'])) {
        $id = $_GET['delete-article'];
        if (is_numeric($id)) {
            $article = \App\Models\Article::findById($id);
            $article->delete();
            header('Location: /kurs2/main/admin-panel.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $article = new \App\Models\Article();
        $article->title = $_POST['title'];
        $article->content = $_POST['content'];
        $article->id = $_POST['id'];
        $article->save();
        header('Location: /kurs2/main/admin-panel.php');
    }
}


$data = \App\Models\Article::findAll();
?>

<h1>Адмін панель</h1>
<br>
<a href="/kurs2/main/add-article.php" style="color: green">Додати нову новину</a>
<hr>
<br>
<?php foreach ($data as $article): ?>
<h3><?php echo $article->title ?></h3>
<p><?php echo $article->content ?></p>
<a href="/kurs2/main/edit-article.php?edit_id=<?php echo $article->id ?>" style="margin-right: 50px; color:blue" >Редагувати новину</a>
    <a href="/kurs2/main/admin-panel.php?delete-article=<?php echo $article->id ?>" style="color: red">Видалити новину</a>
<br><hr>
<?php endforeach;?>