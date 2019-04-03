<?php

if(!isset($_SESSION['client'])) {
	$_SESSION['client'] = 10;
	$_SESSION['server'] = 10;
}

$random = rand(1,3);
$rand = rand(1,4);

if (isset($_POST['vargame'])) {
	if ($_POST['vargame'] >= 1 && $_POST['vargame'] <= 3) {
		if ($_POST['vargame'] == $random) {
			$_SESSION['client'] = $_SESSION['client'] - $rand;
		} else {
			$_SESSION['server'] = $_SESSION['server'] - $rand;
		}
	}
}

if ($_SESSION['client'] < 1) {
	unset($_SESSION['client']);
	unset($_SESSION['server']);
	header ("Location: /index.php?module=game&page=gameover&action=lose");
	exit();
//	Конец игры, выиграл batman';
}

if ($_SESSION['server'] < 1) {
	unset($_SESSION['client']);
	unset($_SESSION['server']);
	header ("Location: /index.php?module=game&page=gameover&action=win");
	exit();
//	Конец игры, выиграл joker
}

