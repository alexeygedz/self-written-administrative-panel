<?php require 'common.php'; ?>
<?php require 'header.php'; ?>
<h1>Обратная связь</h1>
<form method="POST" action="mail.php">
    <input type="text" size="20" placeholder="Введите ваше имя" name="name"><br>
    <input type="text" size="20"placeholder="Введите ваш E-mail" name="email"><br>
    <input type="text" size="20" placeholder="Введите ваш телефон" name="tele"><br>
    <textarea cols="20" name="mess"></textarea><br>
    <input type="submit" value="Отправить">
</form>
<?php require 'footer.php'; ?>