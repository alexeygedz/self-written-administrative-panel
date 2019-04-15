<?php
require '../common.php';
$db->query("DELETE FROM text WHERE title LIKE 'Lorem ipsum%'");
