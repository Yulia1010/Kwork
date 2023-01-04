<?php
	define('CAPTCHA_COOKIE', 'imgcaptcha_');
	if(empty($_POST['captcha']) || md5($_POST['captcha']) != @$_COOKIE[CAPTCHA_COOKIE])
		$message = 'Неверный код с картинки. Повторите попытку.';
	else
	{
		$message = 'Данные капчи введены верно!';
        if((isset($_POST['fio']) && $_POST['email']!="")) {
$to = "studio-ug@mail.ru"; 
$from = $_POST['email']; 
$fio =  $_POST['fio'];
$subject =  "Форма отправки сообщений с сайта";
$message = $fio . " (" . $from . ") " . " оставил сообщение:" . "\n\n" . $_POST['message'];
$headers = 'Content-type: text/plain; charset="utf-8"' . "From:" . $from;

mail($to,$subject,$message,$headers);



}		
		
	}
?>
<!--Переадресация на главную страницу сайта, через 3 секунды-->
<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="http://www.ugneuro.ru/index.html");}
window.setTimeout("changeurl();",5000);
</script>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Отправка сообщения</title>
</head>
<body bgcolor=black>
 <p><font color=#FFF> Попытка отправки сообщения...</font></p> 
	<h3><font color=#FFF><?=$message?></font></h3>
</body>
</html>
