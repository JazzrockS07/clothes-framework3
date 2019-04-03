<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	include './modules/cab/auth.php';
}

if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 5) {
	header('Location:/admin/product/');
	exit();
}

if (isset($_SESSION['user']) && $_SESSION['user']['access'] != 5) {
	header ('Location:/');
}
