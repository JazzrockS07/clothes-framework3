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
				Uploader::resize(300, 450, '300x450/');
				$filename = Uploader::$filename;
			}
			$res = q("
				INSERT INTO `authors` SET
					`name`			='".es($_POST['name'])."',
					`about`			='".es($_POST['about'])."',
					`img`			='".es($filename)."'
			");
		}
		else {
			$res = q("
				INSERT INTO `authors` SET
					`name`			='".es($_POST['name'])."',
					`about`			='".es($_POST['about'])."'
			");
		}

		$_SESSION['info'] = 'Автор был добавлен';
		header('Location:/admin/authors');
		exit();
	}
}

