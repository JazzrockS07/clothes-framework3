<?php

if (isset($_POST['delete'])) {
	foreach($_POST['ids'] as $k => $v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',',$_POST['ids']);
	$res = q("
	    DELETE FROM `news_theme`
	    WHERE `id` IN (".$ids.")
	");
	$_SESSION['info'] = 'Темы были удалены';
	header ("Location:/admin/newstheme");
	exit();
}

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'delete') {
		$res = q("
			DELETE FROM `news_theme`
			WHERE `id` = ".(int)$_GET['id']."
		");
		$_SESSION['info'] = 'Тема была удалена';
		header("Location:/admin/newstheme");
		exit();
	}
}

$res = q("
	SELECT *
	FROM `news_theme`
	ORDER BY `id` DESC 
");

if (isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}