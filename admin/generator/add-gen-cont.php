<?php
if ($argc == 2 && $argv[1] > 0) {
    require '../common.php';
    $number_pages = (int) $argv[1];
    $count = 0;

    while ($count < $number_pages) {
        $title = "Lorem ipsum $count";
        $text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

        $stmt = $db->prepare("INSERT INTO content (title, text) VALUES (:title, :text)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':text', $text);
        $stmt->execute();

        $count++;
    }
} else {
    if ($argc < 2) {
        echo "Введите количество страниц для создания\n";
    }
    if ($argc > 2) {
        echo "Введите не более одной цифры\n";
    }
    if ($argv[1] == '0' && $argc == 2) {
        echo "Введите цифру больше 0\n";
    }
}
