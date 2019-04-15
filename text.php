<?php
require_once 'common.php';

$queryObj = $db->prepare('SELECT title, text FROM text WHERE id = :id');

$queryObj->execute(['id' => $_GET['id']]);
$row = $queryObj->fetch();

if(empty($row)) {
    header('HTTP/1.0 404 not found');
    require 'header.php';
    echo "Страница не существует";
}
else {
    require 'header.php';
    echo '<h1>' . $row['title'] . '</h1>';
    echo "<p>{$row['text']}</p>";
}
require 'footer.php';
