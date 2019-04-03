<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();



// Конфиг сайта
include_once './config.php';
include_once './libs/default.php';

$link = mysqli_connect(Core::$DB_LOCAL,Core::$DB_LOGIN,Core::$DB_PASS,Core::$DB_NAME);
mysqli_set_charset($link,'utf8');
//верхние 2 строки уже не нужны для нового кода, но нужны для старого кода, где используется $link

include_once './variables.php';

// Роутер

ob_start();
	include './'.Core::$CONT.'/allpages.php';
	if (!file_exists('./'.Core::$CONT.'/'.$_GET['module'].'/'.$_GET['page'].'.php') || !file_exists('./skins/'.Core::$SKIN.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl')) {
	 header("Location: /404");
	 exit();
}

	include './'.Core::$CONT.'/'.$_GET['module'].'/'.$_GET['page'].'.php';
	include './skins/'.Core::$SKIN.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl';
	$content = ob_get_contents();
ob_end_clean();

if (isset($_GET['ajax'])) {
	echo $content;
	exit;
}

include './skins/'.Core::$SKIN.'/index.tpl';