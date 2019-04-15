<?php
if(isset($_POST['id']))
{
    require '../common.php';
    $id = (int) $_POST['id'];
    $login = (string) $_POST['login'];
    $password = (string) $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("UPDATE user SET login = :login, password = :password WHERE user_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}
header ('Location: /admin/user/edit-users.php');