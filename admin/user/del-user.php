<?php
if(isset($_POST['id']))
{
    require '../common.php';
    $id = (int) $_POST['id'];
    $db->query("DELETE FROM user WHERE user_id = '$id'");
}
header ('Location: /admin/user/edit-users.php');
