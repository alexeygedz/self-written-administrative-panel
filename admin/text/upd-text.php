<?php
if(isset($_POST['id']))
{
    require '../common.php';
    $id = (int) $_POST['id'];
    $title = (string) $_POST['title'];
    $text = (string) $_POST['text'];
    $stmt = $db->prepare("UPDATE text SET title = :title, text = :text WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':text', $text);
    $stmt->execute();
}
header ('Location: /admin/text/edit-texts.php');
