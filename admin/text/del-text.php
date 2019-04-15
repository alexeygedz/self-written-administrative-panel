<?php
if(isset($_POST['id']))
{
    require '../common.php';
    $id = (int) $_POST['id'];
    $db->query("DELETE FROM text WHERE id = '$id'");
}
header ('Location: /admin/text/edit-texts.php');
