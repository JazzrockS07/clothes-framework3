<?php

if (isset($_POST['delete'])) {
	foreach($_POST['ids'] as $k => $v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',',$_POST['ids']);
	$res = q("
	    DELETE FROM `authors`
	    WHERE `id` IN (".$ids.")
	");
	$_SESSION['info'] = 'Авторы были удалены';
	header ("Location:/admin/authors");
	exit();
}

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'delete') {
		$res = q("
			DELETE FROM `authors`
			WHERE `id` = ".(int)$_GET['id']."
		");
		$_SESSION['info'] = 'Автор был удален';
		header("Location:/admin/authors");
		exit();
	}
}

$authors = q("
	SELECT *
	FROM `authors`
	ORDER BY `id` DESC 
");

if (isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}