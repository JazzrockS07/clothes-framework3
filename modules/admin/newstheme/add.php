<?php

if (isset($_POST['add'],$_POST['theme'])) {

	$_POST = trimAll($_POST);

	if (empty($_POST['theme'])) {
		$error = 'Вы не заполнили все обязательные поля';
	} else {

		$res = q("
			INSERT INTO `news_theme` SET
				`theme`			='".es($_POST['theme'])."'
		");

		$_SESSION['info'] = 'Тема была добавлена';
		header('Location:/admin/newstheme');
		exit();
	}
}

