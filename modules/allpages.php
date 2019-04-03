<?php

if (isset($_SESSION['user'])) {
	$res = q("
		SELECT *
		FROM `users`
		WHERE 	`id` 	= ".(int)$_SESSION['user']['id']."
			AND `hash`	= '".es($_SESSION['user']['hash'])."'
		LIMIT 1
	");
	$_SESSION['user'] = mysqli_fetch_assoc($res);
	if ($_SESSION['user']['active'] != 1) {
		include './modules/cab/exit.php';
	}
} elseif (isset($_COOKIE['autoauthhash'],$_COOKIE['autoauthid'])) {
		//для тех кто хочет автоавторизацию
	$res = q("
		  SELECT *
		  FROM `users`
		  WHERE `id`   = ".(int)$_COOKIE['autoauthid']."
		  	AND `hash` = '".es($_COOKIE['autoauthhash'])."'
		  LIMIT 1
	");
	if (mysqli_num_rows($res)) {
		$_SESSION['user'] = mysqli_fetch_assoc($res);
		if ($_SESSION['user']['hash'] != $_COOKIE['autoauthhash'] || $_SESSION['user']['ip_address'] != $_SERVER['REMOTE_ADDR']) {
			include './modules/cab/exit.php';
		}
	}
}





