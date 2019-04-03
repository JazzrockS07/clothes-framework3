<?php

$_SESSION['time'] = time();

$res = q("
	INSERT INTO `comments` SET
		`name`	='".es($_POST['name'])."',
		`text`	='".es($_POST['text'])."'	
");


$res2 = q("
	SELECT *
	FROM `comments`
	WHERE `datetime_create` >= '".$_SESSION['time']."'
");


$comment=array();
$_SESSION['my_id']=array();
while($row=$res2->fetch_assoc()){
	$comment=$row;
	$_SESSION['my_id'][] = $row['id'];
}

echo json_encode($comment);
exit;