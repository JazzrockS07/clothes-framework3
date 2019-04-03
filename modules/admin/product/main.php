<?php

if (isset($_POST['delete'])) {
	foreach($_POST['ids'] as $k => $v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',',$_POST['ids']);
	$res = q("
	    DELETE FROM `product`
	    WHERE `id` IN (".$ids.")
	");
	$_SESSION['info'] = 'Товары были удалены';
	header ("Location:/admin/product");
	exit();
}

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'delete') {
		$res = q("
			DELETE FROM `product`
			WHERE `id` = ".(int)$_GET['id']."
		");
		$_SESSION['info'] = 'Товар был удален';
		header("Location:/admin/product");
		exit();
	}
}

$product = q("
	SELECT *
	FROM `product`
	ORDER BY `id` DESC 
");

if (isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}