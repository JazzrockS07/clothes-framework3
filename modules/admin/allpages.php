<?php

Core::$CSS[] = '<link href="/skins/admin/css/admin.css" rel="stylesheet" type="text/css">';

if (!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	if ($_GET['module'] != 'static' || $_GET['page'] != 'main') {
		header("Location: /admin/static/main");
		exit();
	}
}

include './modules/allpages.php';





