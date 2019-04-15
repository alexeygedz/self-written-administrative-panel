<?php

if(isset($_GET['id'])) {

    require '../common.php';

    $queryObj = $db->prepare('SELECT link FROM short_links WHERE id = :id');
    $queryObj->execute(['id' => $_GET['id']]);
    $row = $queryObj->fetch();

    if(empty($row)) {

        header('HTTP/1.0 404 not found');

    }

    $link = $row['link'];

    header ("Location: $link");

}

