<?php

if (isset($_GET['exit'])) {
	setcookie('access',0,time()-3600,'/');
	header("Location: /index.php");
	exit();
}


