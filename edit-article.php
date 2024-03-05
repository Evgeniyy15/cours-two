<?php
spl_autoload_register(function ($className) {
    $file = __DIR__ . '/' . $className . '.php';
    if (file_exists($file))
        require $file;
});

if (!empty($_GET['edit_id'])):
    $data = App\Models\Article::findById($_GET['edit_id']);
    if (!empty($data)):
        ?>
        <h1>Додати нову новину</h1>
        <form action="/kurs2/main/admin-panel.php" method="post">
            <input type="hidden" value="<?php echo $data->id ?>" name="id">
            <label for="title">Редагуйте назву для новини</label>
            <br>
            <input type="text" id="title" name="title" value="<?php echo $data->title ?>">
            <br>
            <label for="content">Редагуйте текст для новини</label>
            <br>
            <textarea name="content" id="content"> <?php echo $data->content ?> </textarea>
            <br>
            <button type="submit" style="color: green">Редагувати</button>
        </form>

    <?php endif; ?>
<?php endif; ?>