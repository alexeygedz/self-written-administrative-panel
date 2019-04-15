<?php
if(!empty($_POST['title']) && !empty($_POST['text']))
{
    require '../common.php';
    $title = (string) $_POST['title'];
    $text = (string) $_POST['text'];
    $stmt = $db->prepare("INSERT INTO text (title, text) VALUES (:title, :text)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':text', $text);
    $stmt->execute();
}

else {
    echo "Не все поля заполнены ";
}
header ('Location: /admin/text/edit-texts.php');
