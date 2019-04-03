<?php

$allowedlogin=array('mama','papa','kinder');
if (isset($_POST['login'],$_POST['password'],$_POST['email'])) {
	if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		if(in_array($_POST['login'], $allowedlogin)) {
			setcookie('access',"1",time()+3600,'/');
			header("Location: /index.php?module=login&page=admin");
			exit();
		}
	}
}
