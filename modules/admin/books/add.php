<?php


if (isset($_POST['add'],$_POST['name'],$_POST['author1'],$_POST['author2'],$_POST['author3'],$_POST['size'],$_POST['year'],$_POST['price'],$_POST['about'])) {

	$_POST = trimAll($_POST);

	if (empty($_POST['name']) or empty($_POST['price']) or empty($_POST['about']) or empty($_POST['author1'])) {
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
				INSERT INTO `books` SET
					`name`			='".es($_POST['name'])."',
					`size`			=".(int)$_POST['size'].",
					`year`			=".(int)$_POST['year'].",
					`price`			=".(int)$_POST['price'].",
					`about`			='".es($_POST['about'])."',
					`img`			='".es($filename)."'
			");
		}
		else {
			$res = q("
				INSERT INTO `books` SET
					`name`			='".es($_POST['name'])."',
					`size`			=".(int)$_POST['size'].",
					`year`			=".(int)$_POST['year'].",
					`price`			=".(int)$_POST['price'].",
					`about`			='".es($_POST['about'])."'
			");
		}
		$book_id = DB::_()->insert_id;

		$res = q("
			SELECT *
			FROM `authors`
			WHERE `name`		='".es($_POST['author1'])."'
			LIMIT 1
		");
		$row = $res->fetch_assoc();
		$res = q("
			INSERT INTO `books2authors` SET
				`book_id`		=".(int)$book_id.",
				`author_id`		=".(int)$row['id']."
		");

		if(!empty($_POST['author2'])) {
			$res = q("
				SELECT *
				FROM `authors`
				WHERE `name`		='".es($_POST['author2'])."'
				LIMIT 1
			");
			$row = $res->fetch_assoc();
			$res = q("
				INSERT INTO `books2authors` SET
					`book_id`		=".(int)$book_id.",
					`author_id`		=".(int)$row['id']."
			");
		}

		if(!empty($_POST['author3'])) {
			$res = q("
				SELECT *
				FROM `authors`
				WHERE `name`		='".es($_POST['author3'])."'
				LIMIT 1
			");
			$row = $res->fetch_assoc();
			$res = q("
				INSERT INTO `books2authors` SET
					`book_id`		=".(int)$book_id.",
					`author_id`		=".(int)$row['id']."
			");
		}

		$_SESSION['info'] = 'Книга была добавлена';
		header('Location:/admin/books');
		exit();
	}
}


$res1 = q("
	SELECT *
	FROM `authors`
	ORDER BY `id`
");


$res2 = q("
	SELECT *
	FROM `authors`
	ORDER BY `id`
");


$res3 = q("
	SELECT *
	FROM `authors`
	ORDER BY `id`
");