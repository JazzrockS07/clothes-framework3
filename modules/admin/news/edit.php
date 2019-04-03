<?php

if (isset($_POST['ok'],$_POST['news_name'],$_POST['theme'],$_POST['text'])) {

	$_POST = trimAll($_POST);

	if (empty($_POST['news_name']) or empty($_POST['theme'])) {
		$error = 'Вы не заполнили все обязательные поля';
	} else {

		$res = q("
			UPDATE `news` SET
				`news_name`		='".es($_POST['news_name'])."',
				`theme`			='".es($_POST['theme'])."',
				`text`			='".es($_POST['text'])."'
			WHERE `id` = ".(int)$_GET['id']."
		");

		$_SESSION['info'] = 'Новость была изменена';
		header('Location:/admin/news');
		exit();
	}
}

$res = q ("
	SELECT *
    FROM `news`
	WHERE `id` = ".(int)$_GET['id']."
    LIMIT 1
");

if (!$res->num_rows) {
	$_SESSION['info'] = 'Данного товара не существует!';
	header('Location:/admin/product');
	exit();
}

$row = $res->fetch_assoc();
$res->close();

$res2 = q("
	SELECT *
	FROM `news_theme`
	ORDER BY `id`
");


foreach ($_POST as $k => $v) {
	if (isset($_POST)) {
		$row = $_POST;
	}
}