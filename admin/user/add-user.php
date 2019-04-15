<?php
if(!empty($_POST['login']) && !empty($_POST['password']))
{
    require '../common.php';
    $login = (string) $_POST['login'];
    $password = (string) $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO user (login, password) VALUES (:login, :password)");
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}

else {
    echo "Не все поля заполнены ";
}
header ('Location: /admin/user/edit-users.php');
