<?php

class Paginator
{
    protected $numberLinks = 1;
    protected $dataBase;
    protected $dataBaseName = "text";

    function __construct($db)
    {
        $this->dataBase = $db;
    }

    // Количество выводимых ссылок на странице
    public function howManyLinks() {
        return $this->numberLinks;
    }

    // Вычисляем начиная c какого номера следует выводить сообщения
    public function startMessageNumbers($currentPage) {
        return $start = $currentPage * $this->numberLinks - $this->numberLinks;
    }

    public function outputPaginatorLinks($currentPage) {
        $currentPage = intval($currentPage); // id текущей страницы

        // Возвращает количество всех строк в таблице
        $result = $this->dataBase->prepare("SELECT COUNT(*) FROM $this->dataBaseName");
        $result->execute();

        // Возвращает итоговое число строк в таблице
        $result = $result->fetch(PDO::FETCH_NUM);
        $numberRowsTable = $result[0]; // Общее количество строк в таблице

        // Находим общее число страниц
        $numberPages = intval(($numberRowsTable - 1) / $this->numberLinks) + 1; // Число страниц

        // Если значение $currentPage меньше единицы или отрицательно переходим на первую страницу
        if (empty($currentPage) || $currentPage < 0) {
            $currentPage = 1;
        }

        // А если слишком большое, то переходим на последнюю
        if ($currentPage > $numberPages) {
            $currentPage = $numberPages;
        }

        $pervpage = "";
        $nextpage = "";
        $currentPage2left = "";
        $currentPage1left = "";
        $currentPage2right = "";
        $currentPage1right = "";


        // Проверяем нужны ли стрелки назад
        if ($currentPage != 1) $pervpage = "<a href= ./edit-texts.php?page=1> << </a><a href= ./edit-texts.php?page=". ($currentPage - 1) ."><</a> ";

        // Проверяем нужны ли стрелки вперед
        if ($currentPage != $numberPages) $nextpage = " <a href= ./edit-texts.php?page=". ($currentPage + 1) ."> > </a><a href= ./edit-texts.php?page=" .$numberPages. ">>></a>";

        // Находим две ближайшие станицы с обоих краев, если они есть
        if($currentPage - 2 > 0) $currentPage2left = " <a href= ./edit-texts.php?page=". ($currentPage - 2) ." > ". ($currentPage - 2) ."</a> | ";
        if($currentPage - 1 > 0) $currentPage1left = "<a href= ./edit-texts.php?page=". ($currentPage - 1) ." > ". ($currentPage - 1) ."</a> | ";
        if($currentPage + 2 <= $numberPages) $currentPage2right = " | <a href= ./edit-texts.php?page=". ($currentPage + 2) ." > ". ($currentPage + 2) ."</a>";
        if($currentPage + 1 <= $numberPages) $currentPage1right = " | <a href= ./edit-texts.php?page=". ($currentPage + 1) ." > ". ($currentPage + 1) ."</a>";

        // Вывод меню
        return $pervpage.$currentPage2left.$currentPage1left."<b>".$currentPage."</b>".$currentPage1right.$currentPage2right.$nextpage;
    }
}
