<?php

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    require '../common.php';
    $login = (string)$_POST['login'];
    $password = (string)$_POST['password'];

    $stmt = $db->prepare('SELECT password FROM user WHERE login = :login');
    $stmt->execute([':login' => $login]);
    $stmt = $stmt->fetch(PDO::FETCH_NUM);
    $result = $stmt[0];

    if (password_verify($password, $result)) {
        $_SESSION['user'] = [
            'login' => $login
        ];
        header('Location: /admin/');
    }
}


