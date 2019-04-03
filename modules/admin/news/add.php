<?php

if (isset($_POST['add'],$_POST['news_name'],$_POST['theme'],$_POST['text'])) {

	$_POST = trimAll($_POST);

	if (empty($_POST['news_name']) or empty($_POST['theme'])) {
		$error = 'Вы не заполнили все обязательные поля';
	} else {

		$res = q("
			INSERT INTO `news` SET
				`news_name`		='".es($_POST['news_name'])."',
				`theme`			='".es($_POST['theme'])."',
				`text`			='".es($_POST['text'])."'
		");

		$_SESSION['info'] = 'Новость была добавлена';
		header('Location:/admin/news');
		exit();
	}
}

$res = q("
	SELECT *
	FROM `news_theme`
	ORDER BY `id`
");

