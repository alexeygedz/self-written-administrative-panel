<?php
if (!empty($_GET["id"])) {
    require '../common.php';
    $id = (int) $_GET['id'];
    $data = $db->prepare("SELECT title, text FROM text WHERE id = $id");
    $data->execute();
    $result = $data->fetch(PDO::FETCH_ASSOC);
?>

    <link rel="stylesheet" href="/style.css">
    <h1>Редактирование данных</h1>
    <form action="upd-text.php" method="post" name="updateForm<?php echo $link['id']?>">
        <input type="text" name="title" value="<?php echo htmlspecialchars($result['title'])?>" />
        <br />
        <textarea rows="15" cols="45" name="text"><?php echo htmlspecialchars($result['text'])?></textarea>
        <br />
        <input type="hidden" name="id" value="<?php echo $id?>" />
        <input type="submit" name="submit" value="Сохранить" />
    </form>

<?php
}

else {
    header('HTTP/1.0 404 Not Found');
}
?>
