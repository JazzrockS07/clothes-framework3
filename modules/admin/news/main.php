<?php

if (isset($_POST['delete'])) {
	foreach($_POST['ids'] as $k => $v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',',$_POST['ids']);
	$res = q("
	    DELETE FROM `news`
	    WHERE `id` IN (".$ids.")
	");
	$_SESSION['info'] = 'Новости были удалены';
	header ("Location:/admin/news");
	exit();
}

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'delete') {
		$res = q("
			DELETE FROM `news`
			WHERE `id` = ".(int)$_GET['id']."
		");
		$_SESSION['info'] = 'Новость была удалена';
		header("Location:/admin/news");
		exit();
	}
}

$news = q("
	SELECT *
	FROM `news`
	ORDER BY `id` DESC 
");

if (isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}