<?php
if (!empty($_GET["id"])) {
    require '../common.php';
    $id = (int) $_GET['id'];
    $data = $db->prepare("SELECT login, password FROM user WHERE user_id = :id");
    $data->bindParam(':id', $id);
    $data->execute();
    $result = $data->fetch(PDO::FETCH_ASSOC);
?>

    <link rel="stylesheet" href="/style.css">
    <h1>Редактирование данных</h1>
    <form action="upd-user.php" method="post">
        <input type="text" name="login" value="<?php echo htmlspecialchars($result['login'])?>" />
        <br />
        <textarea rows="15" cols="45" name="password"></textarea>
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
