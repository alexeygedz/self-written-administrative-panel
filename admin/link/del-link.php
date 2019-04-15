<?php
if(isset($_POST['id']))
{
    require '../common.php';
    $id = (int) $_POST['id'];
    $db->query("DELETE FROM menu_item WHERE id = '$id'");
}
header ('Location: /admin/link/edit-links.php');
