<?php

if (isset($_POST['add'],$_POST['name'],$_POST['size'],$_POST['year'],$_POST['price'],$_POST['about'])) {

	$_POST = trimAll($_POST);

	if (empty($_POST['name']) or empty($_POST['price']) or empty($_POST['about'])) {
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
				UPDATE `books` SET
					`name`			='".es($_POST['name'])."',
					`size`			=".(int)$_POST['size'].",
					`year`			=".(int)$_POST['year'].",
					`price`			=".(int)$_POST['price'].",
					`about`			='".es($_POST['about'])."',
					`img`			='".es($filename)."'
			WHERE `id` = ".(int)$_GET['id']."
			");
		}
		else {
			$res = q("
				UPDATE `books` SET
					`name`			='".es($_POST['name'])."',
					`size`			=".(int)$_POST['size'].",
					`year`			=".(int)$_POST['year'].",
					`price`			=".(int)$_POST['price'].",
					`about`			='".es($_POST['about'])."'
			WHERE `id` = ".(int)$_GET['id']."
			");
		}

		$del = q("
			DELETE FROM `books2authors`
			WHERE `book_id`		=".(int)$_GET['id']."
		");

		$res = q("
			SELECT *
			FROM `authors`
			WHERE `name`		='".es($_POST['author1'])."'
			LIMIT 1
		");
		$row=$res->fetch_assoc();
		$res = q("
			INSERT INTO `books2authors` SET
				`book_id`		=".(int)$_GET['id'].",
				`author_id`		=".(int)$row['id']."
		");

		if (!empty($_POST['author2'])) {
			$res = q("
				SELECT *
				FROM `authors`
				WHERE `name`		='".es($_POST['author2'])."'
				LIMIT 1
			");
			$row=$res->fetch_assoc();
			$res = q("
				INSERT INTO `books2authors` SET
					`book_id`		=".(int)$_GET['id'].",
					`author_id`		=".(int)$row['id']."
			");
		}

		if (!empty($_POST['author3'])) {
			$res = q("
				SELECT *
				FROM `authors`
				WHERE `name`		='".es($_POST['author3'])."'
				LIMIT 1
			");
			$row=$res->fetch_assoc();
			$res = q("
				INSERT INTO `books2authors` SET
					`book_id`		=".(int)$_GET['id'].",
					`author_id`		=".(int)$row['id']."
			");
		}

		$_SESSION['info'] = 'Данные о книге были изменены';
		header('Location:/admin/books');
		exit();
	}
}

$res = q ("
	SELECT *
    FROM `books`
	WHERE `id` = ".(int)$_GET['id']."
    LIMIT 1
");

if (!$res->num_rows) {
	$_SESSION['info'] = 'Данной книги не существует!';
	header('Location:/admin/books');
	exit();
}

$row = $res->fetch_assoc();
$res->close();

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


$res = q ("
	SELECT *
	FROM `books2authors`
	WHERE `book_id` = ".(int)$_GET['id']."
	ORDER BY `id`
");

$author=array();
while ($row_authorid=$res->fetch_assoc()) {
	$author[]=(int)$row_authorid['author_id'];
}
$res->close();
$author=implode(",",$author);

$res = q("
	SELECT *
	FROM `authors`
	WHERE id IN ($author)
");
$rowauthor=array();
while ($rows = $res->fetch_assoc()) {
	$rowauthor[]=$rows['name'];
}
$res->close();


foreach ($_POST as $k => $v) {
	if (isset($_POST)) {
		$row = $_POST;
	}
}

