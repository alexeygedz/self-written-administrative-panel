<?php
if(!empty($_POST['name']) && !empty($_POST['url']))
{
    require '../common.php';
    $name = (string) $_POST['name'];
    $url = (string) $_POST['url'];
    $stmt = $db->prepare("INSERT INTO menu_item (name, url) VALUES (:name, :url)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':url', $url);
    $stmt->execute();
}

else {
    echo "Не все поля заполнены ";
}
header ('Location: /admin/link/edit-links.php');
