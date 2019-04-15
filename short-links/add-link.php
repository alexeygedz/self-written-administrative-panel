<?php

if(isset($_POST['link'])) {

    require '../common.php';

    $link = (string)$_POST['link'];

    $stmt = $db->prepare('SELECT link FROM short_links WHERE link = :link');
    $stmt->bindParam(':link', $link);
    $stmt->execute();
    $rowLink = $stmt->fetch();

    if (empty($rowLink['link'])) {

        $stmt = $db->prepare('INSERT INTO short_links (link) VALUES (:link)');
        $stmt->bindParam(':link', $link);
        $stmt->execute();

    }

    $stmt = $db->prepare('SELECT id FROM short_links WHERE link = :link');
    $stmt->bindParam(':link', $link);
    $stmt->execute();
    $row = $stmt->fetch();

    $id = $row['id'];

    echo "http://studyproject.lo/short-links/redirect-link.php?id=$id";

}

