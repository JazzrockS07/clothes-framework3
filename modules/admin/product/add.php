<?php

if (isset($_POST['submit'])) {
	if(!Uploader::upload($_FILES['file'])) {
		$error['img'] = Uploader::$error;
	}
	else {
		Uploader::resize(100, 100, '100x100/');
		Uploader::resize(225, 270, '225x270/');
		$filename = Uploader::$filename;
		$rezult = Uploader::$rezult;
	}
}




	if(isset($_POST['add'], $_POST['code'], $_POST['name'], $_POST['cat'], $_POST['availability'], $_POST['price'], $_POST['manufacturer'], $_POST['gender'], $_POST['details'])) {

			$_POST = trimAll($_POST);

			if (empty($_POST['name']) or empty($_POST['price'])) {
				$error = 'Вы не заполнили все обязательные поля';
			} else {

				$res = q("
				INSERT INTO `product` SET
					`code`			='".es($_POST['code'])."',
					`name`			='".es($_POST['name'])."',
					`cat`			='".es($_POST['cat'])."',
					`availability`	='".es($_POST['availability'])."',
					`price`			=".(int)$_POST['price'].",
					`manufacturer`	='".es($_POST['manufacturer'])."',
					`gender`		='".es($_POST['gender'])."',
					`details`		='".es($_POST['details'])."',
					`img`			='".es($_POST['img'])."'
					");

				$_SESSION['info'] = 'Товар был добавлен';
				header('Location:/admin/product');
				exit();
			}
	}



$category = array ('HOODIES & SWEATSHIRTS','ACCESSORIES','COATS & JACKETS','DRESSES','DENIM','JEWELLERY & WATCHES','GIFTS','SKIRTS','SHOES','SHORTS','JUMPERS & CARDIGANS','MATERNITY','SHIRTS & BLOUSES','PETITE');

