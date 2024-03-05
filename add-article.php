
<h1>Додати нову новину</h1>
<form action="/kurs2/main/admin-panel.php" method="post">
    <input type="hidden" value="" name="id">
    <label for="title">Введіть назву для новини</label>
    <br>
    <input type="text" id="title" name="title">
    <br>
    <label for="content">Введіть текст для новини</label>
    <br>
    <textarea name="content" id="content"></textarea>
    <br>
    <button type="submit" style="color: green">Додати</button>
</form>