<?php
require_once 'config.php';

// Костыль для отображения ошибок в браузере
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (is_file(__DIR__ . '/config-local.php')) {
	require_once __DIR__ . '/config-local.php';
}

$db = new PDO('mysql:dbname='.$dbName.';host='.$dbHost, $dbLogin, $dbPass);
$db->query('SET NAMES '.$dbEncoding);

session_start();

if (strripos($_SERVER['REQUEST_URI'], 'admin') && !isset($_SESSION['user'])) {
    header('Location: /authorization/authorization.php');
}
