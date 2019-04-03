<?php

if (isset($_POST['delete'])) {
	foreach($_POST['ids'] as $k => $v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',',$_POST['ids']);
	$res = q("
	    DELETE FROM `books`
	    WHERE `id` IN (".$ids.")
	");
	$res1 = q("
		DELETE FROM `books2authors`
		WHERE `book_id` IN (".$ids.")
	");
	$_SESSION['info'] = 'Книги были удалены';
	header ("Location:/admin/books");
	exit();
}

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'delete') {
		$res = q("
			DELETE FROM `books`
			WHERE `id` = ".(int)$_GET['id']."
		");
		$res1 = q("
			DELETE FROM `books2authors`
			WHERE `book_id` = ".(int)$_GET['id']."
		");
		$_SESSION['info'] = 'Книга была удалена';
		header("Location:/admin/books");
		exit();
	}
}

$books = q("
	SELECT *
	FROM `books`
	ORDER BY `id` DESC 
");

if (isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}