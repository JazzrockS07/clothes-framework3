<?php

if (isset($_POST['ok'],$_POST['login'],$_POST['email'],$_POST['age'])) {

	$_POST = trimAll($_POST);

	if(empty($_POST['login'])) {
		$error1 = 'Отсутствует логин пользователя';
	} elseif(mb_strlen($_POST['login']) < 2) {
		$error1 = 'Логин слишком короткий';
	} elseif(mb_strlen($_POST['login']) > 16) {
		$error1 = 'Логин слишком длинный';
	}
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error1 = 'Вы не заполнили email или формат email неправильный';
	}

	$res = q("
		SELECT *
		FROM `users`
		WHERE `id` = ".(int)$_SESSION['user']['id']."
	");
	$row=$res->fetch_assoc();
	if ($_POST['login']!=$row['login']) {
		$res = q("
	  	SELECT `id`
	  	FROM `users`
	  	WHERE `login` = '".es($_POST['login'])."'
	  	LIMIT 1
	");
		if (mysqli_num_rows($res)) {
			$error1 = 'Такой логин уже занят';
		}
	}

	$res = q("
		SELECT *
		FROM `users`
		WHERE `id` = ".(int)$_SESSION['user']['id']."
	");
	$row=$res->fetch_assoc();
	if ($_POST['email']!=$row['email']) {
		$res = q("
	  	SELECT `id`
	  	FROM `users`
	  	WHERE `email` = '".es($_POST['email'])."'
	  	LIMIT 1
	");
		if (mysqli_num_rows($res)) {
			$error1 = 'Такой email уже занят';
		}
	}

	if (!isset($error1)){
		$res = q("
			UPDATE `users` SET
			`login`			='".es($_POST['login'])."',
			`email`			='".es($_POST['email'])."',
			`age`		=".(int)$_POST['age']."
			WHERE `id` = ".(int)$_SESSION['user']['id']."
		");
		$_SESSION['info'] = 'Данные пользователя были успешно изменены';
	}
}

if (isset($_SESSION['user'])) {
	$user = q ("
			SELECT *
			FROM `users`
			WHERE `id` = ".(int)$_SESSION['user']['id']."
			LIMIT 1
	");
	$row = mysqli_fetch_assoc($user);
}

if (isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}

if (isset($_POST['submit'])) {
	if(!Uploader::upload($_FILES['file'])) {
		$error['img'] = Uploader::$error;
	} else {
		Uploader::resize(100,100,'100x100/');
		$filename=Uploader::$filename;
		$rezult=Uploader::$rezult;
		$res = q("
			UPDATE `users` SET
			`img` = '".$filename."'
			WHERE `id` = ".(int)$_SESSION['user']['id']."
  	  	");

	}
}

/* Старый код
$array = array ('image/gif','image/jpeg','image/png');
$array2 = array ('jpg','jpeg','gif','png');

if (isset($_POST['submit'])) {
	if ($_FILES['file']['error'] == 0) {
		if ($_FILES['file']['size'] < 5000 || $_FILES['file']['size'] >50000000) {
			$error = 'Размер изображения нам не подходит';
		} else {
			preg_match('#\.([a-z]+)$#iu',$_FILES['file']['name'],$matches);
			if (isset($matches[1])) {
				$matches[1] = mb_strtolower($matches[1]);

				$temp = getimagesize($_FILES['file']['tmp_name']);
				$name = '/uploaded/'.date('Ymd-His').'img'.rand(10000,99999).'.jpg';
				$width = $temp['0'];
				$height = $temp['1'];

				if (!in_array($matches[1],$array2)) {
					$error = 'Не подходит расширение изображения';
				} elseif (!in_array($temp['mime'],$array)) {
					$error = 'Не подходит тип файла, можно загружать только изображения';
				} elseif (!move_uploaded_file($_FILES['file']['tmp_name'],'.'.$name)) {
					$error = 'Изображение не загружено! Ошибка';
				} elseif ($temp['0'] > 100 || $temp['1'] > 100){
					if ($temp['0'] > $temp['1']) {
						$newwidth = 100;
						$newheight = round($newwidth * $height/$width);
					} elseif ($temp['0'] == $temp['1']) {
						$newwidth = 100;
						$newheight = 100;
					} elseif ($temp['0'] < $temp['1']) {
						$newheight = 100;
						$newwidth = round ($newheight * $width/$height);
					}
					if ($newheight <5 || $newwidth < 5) {
						$error = 'Непропорциональное изображение, выберите другое';
					} else {
						if ($temp['mime'] == 'image/jpeg') {
							$templ = imagecreatefromjpeg('.'.$name);
						} elseif ($temp['mime'] == 'image/gif') {
							$templ = imagecreatefromgif('.'.$name);
						} elseif ($temp['mime'] == 'image/png') {
							$templ = imagecreatefrompng('.'.$name);
						}
						$tmp = imagecreatetruecolor($newwidth,$newheight);
						imagecopyresampled($tmp,$templ,0,0,0,0,$newwidth,$newheight,$width,$height);
						$filename = 'uploaded/'.date('Ymd-His').'img'.rand(10000,99999).'.jpg';
						imagejpeg($tmp,$filename,100);
						imagedestroy($tmp);
						$filename = '/'.$filename;
						$rezult = 'Ваше изображение было успешно уменьшено и загружено';
						$res = q("
							UPDATE `users` SET
							`img` = '".$filename."'
							WHERE `id` = ".(int)$_SESSION['user']['id']."
						");
					}
				} else {
					$rezult = 'Ваше изображение загружено верно';
					$res = q("
						UPDATE `users` SET
						`img` = '".$name."'
						WHERE `id` = ".(int)$_SESSION['user']['id']."
					");
				}
			} else {
				echo 'Данный файл не является картинкой. Принимаемые типы файлов: jpg, png, gif';
			}
		}
	}
}
*/