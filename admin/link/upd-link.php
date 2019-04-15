<?php
if(isset($_POST['id'])) {
    require '../common.php';
    $id = (int) $_POST['id'];
    $name = (string) $_POST['name'];
    $url = (string) $_POST['url'];
    $stmt = $db->prepare("UPDATE menu_item SET name = :name, url = :url WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':url', $url);
    $stmt->execute();
}
header ('Location: /admin/link/edit-links.php');
