<?php
if (!empty($_GET["id"])) {
    require '../common.php';
    $id = (int) $_GET['id'];
    $data = $db->prepare("SELECT name, url FROM menu_item WHERE id = $id");
    $data->execute();
    $result = $data->fetch(PDO::FETCH_ASSOC);
?>

    <link rel="stylesheet" href="/style.css">
    <h1>Редактирование данных</h1>
    <form action="upd-link.php" method="post" name="updateForm<?php echo $link['id']?>">
        <input type="text" name="name" value="<?php echo htmlspecialchars($result['name'])?>" />
        <br />
        <input type="text" name="url" value="<?php echo htmlspecialchars($result['url'])?>" />
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
