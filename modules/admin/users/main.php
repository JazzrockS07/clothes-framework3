<?php

if (isset($_POST['ok'],$_POST['login'],$_POST['password'],$_POST['email'],$_POST['access'])) {

	$_POST = trimAll($_POST);

	if(empty($_POST['login'])) {
		$error = 'Отсутствует логин пользователя';
	} elseif(mb_strlen($_POST['login']) < 2) {
		$error = 'Логин слишком короткий';
	} elseif(mb_strlen($_POST['login']) > 16) {
		$error = 'Логин слишком длинный';
	}
	if(mb_strlen($_POST['password']) < 5) {
		$error = 'Пароль должен быть длинее 4-х символов';
	}
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error = 'Вы не заполнили email или формат email неправильный';
	}

	$res = q("
		SELECT *
		FROM `users`
		WHERE `id` = ".(int)$_GET['id']."
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
			$error = 'Такой логин уже занят';
		}
	}

	$res = q("
		SELECT *
		FROM `users`
		WHERE `id` = ".(int)$_GET['id']."
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
			$error = 'Такой email уже занят';
		}
	}

	if (!isset($error)) {
		$res = q("
			SELECT *
			FROM `users`
			WHERE `id` = ".(int)$_GET['id']."
			LIMIT 1
		");
		$user = $res->fetch_assoc();
		$res->close();
		if($_POST['password'] == $user['password']) {
			$res = q("
				UPDATE `users` SET
					`login`			='".es($_POST['login'])."',
					`email`			='".es($_POST['email'])."',
				  	`access`		=".(int)$_POST['access']."
				WHERE `id` = ".(int)$_GET['id']."
			");
		} else {
			$res = q("
				UPDATE `users` SET
				`login`			='".es($_POST['login'])."',
				`password`		='".es(myHash($_POST['password']))."',
				`email`			='".es($_POST['email'])."',
				`access`		=".(int)$_POST['access']."
				WHERE `id` = ".(int)$_GET['id']."
			");

		}
		$_SESSION['info'] = 'Данные пользователя были успешно изменены';
		header("Location:/admin/users");
		exit();
	}
}

$users = q("
	SELECT *
	FROM `users`
	ORDER BY `id` DESC 
");

if (isset($_POST['go'],$_POST['search'])) {
	$search = q("
		SELECT *
		FROM `users`
		WHERE `login` LIKE '%".es($_POST['search'])."%'
		ORDER BY `id` DESC
	");
}

if (isset($_GET['id'])) {
	$user = q ("
			SELECT *
			FROM `users`
			WHERE `id` = ".(int)$_GET['id']."
			LIMIT 1
	");
	$row = mysqli_fetch_assoc($user);
}

if (isset($_POST['delete'])) {
	$res = q("
		DELETE FROM `users`
		WHERE `id` = ".(int)$_GET['id']."
	");
	$_SESSION['info'] = 'Пользователь был удален';
	header("Location:/admin/users");
	exit();
}

if (isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}

