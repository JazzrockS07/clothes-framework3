<?php

if (isset($_POST['add'],$_POST['name'],$_POST['about'])) {

	$_POST = trimAll($_POST);

	if (empty($_POST['name']) or empty($_POST['about'])) {
		$error = 'Вы не заполнили все обязательные поля';
	} else {
		if(!empty($_FILES['file']['name'])) {
			if(!Uploader::upload($_FILES['file'])) {
				$error['img'] = Uploader::$error;
			}
			else {
				Uploader::resize(100, 100, '100x100/');
				Uploader::resize(300, 300, '300x300/');
				$filename = Uploader::$filename;
			}
			$res = q("
				UPDATE `authors` SET
					`name`			='".es($_POST['name'])."',
					`about`			='".es($_POST['about'])."',
					`img`			='".es($filename)."'
			WHERE `id` = ".(int)$_GET['id']."
			");
		}
		else {
			$res = q("
				UPDATE `authors` SET
					`name`			='".es($_POST['name'])."',
					`about`			='".es($_POST['about'])."'
			WHERE `id` = ".(int)$_GET['id']."
			");
		}

		$_SESSION['info'] = 'Данные об авторе были изменены';
		header('Location:/admin/authors');
		exit();
	}
}

$res = q ("
	SELECT *
    FROM `authors`
	WHERE `id` = ".(int)$_GET['id']."
    LIMIT 1
");

if (!$res->num_rows) {
	$_SESSION['info'] = 'Данного автора не существует!';
	header('Location:/admin/authors');
	exit();
}

$row = $res->fetch_assoc();
$res->close();

foreach ($_POST as $k => $v) {
	if (isset($_POST)) {
		$row = $_POST;
	}
}

