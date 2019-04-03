<?php

if (isset($_POST['ok'],$_POST['theme'])) {

	$_POST = trimAll($_POST);

	if (empty($_POST['theme'])) {
		$error = 'Вы не заполнили все обязательные поля';
	} else {

		$res = q ("
			SELECT *
    		FROM `news_theme`
			WHERE `id` = ".(int)$_GET['id']."
    		LIMIT 1
		");
		$row = $res->fetch_assoc();

		$res = q("
			UPDATE `news_theme` SET
				`theme`			='".es($_POST['theme'])."'
			WHERE `id` = ".(int)$_GET['id']."
		");

		$res = q("
			UPDATE `news` SET
				`theme`	  ='".es($_POST['theme'])."'
			WHERE `theme` ='".es($row['theme'])."'
		");

		unset($_SESSION['theme']);
		$_SESSION['info'] = 'Тема была изменена';
		header('Location:/admin/newstheme');
		exit();
	}
}

$res = q ("
	SELECT *
    FROM `news_theme`
	WHERE `id` = ".(int)$_GET['id']."
    LIMIT 1
");

if (!$res->num_rows) {
	$_SESSION['info'] = 'Данной темы не существует!';
	header('Location:/admin/theme');
	exit();
}

$row = $res->fetch_assoc();
$res->close();

