<?php

$my_id=implode(",",$_SESSION['my_id']);

$res2 = q("
	SELECT *
	FROM `comments`
	WHERE `id` > '".$_SESSION['id_chat']."'
	AND id NOT IN ($my_id)
");

$comment=array();
while($row=$res2->fetch_assoc()){
	$comment[]=$row;
	$_SESSION['id_chat']=$row['id'];
}

echo json_encode($comment);
exit;