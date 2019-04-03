<?php

Core::$JS[]='<script>
	window.onload=function() {
		intervalId=setInterval("chat()",20000);
	}
</script>';

if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 2) {
	header ("Location:/");
	exit();
}


/* старый код, без JS
if (isset($_POST['name'], $_POST['text'])) {
	$errors = [];
	if (empty ($_POST['name'])) {
		$errors['name'] = 'Вы не ввели имя';
	}
	if (empty ($_POST['text'])) {
		$errors['text'] = 'Вы не ввели текст';
	}
	if(!count($errors)) {
		mysqli_query($link, "
	  	INSERT INTO `comments` SET
  		`name` = '".mysqli_real_escape_string($link, $_POST['name'])."',
  		`text` = '".mysqli_real_escape_string($link, $_POST['text'])."'
  	") or exit (mysqli_error($link));
		header("Location:/index.php?module=comments");
		exit();
	}
}
*/

$res = mysqli_query($link, "
  	SELECT *
  	FROM `comments`
") or exit(mysqli_error($link));


$res2 = q("
	SELECT * 
	FROM `comments`
	ORDER BY id DESC
	LIMIT 1
");

$row2=$res2->fetch_assoc();
$_SESSION['id_chat'] = $row2['id'];
$res2->close();


