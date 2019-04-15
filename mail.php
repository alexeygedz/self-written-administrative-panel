<?php
$name = strip_tags($_POST['name']);
$phone = strip_tags($_POST['tele']);
$mail = strip_tags($_POST['email']);
$message = strip_tags($_POST['mess']);
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name'.$mail. "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

mail('alexeygedz@gmail.com', 
'Обратная связь с study.lo', 
'Вам написал: '.$name.'<br />Его номер: '.$phone.'<br />Его почта: '.$mail.'<br />Его сообщение: '.$message,"Content-type:text/html", 
$headers);

echo '<body>Спасибо ваше письмо отправлено.</body>';

