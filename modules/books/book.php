<?php

$res = q("
	SELECT *
	FROM `books`
	WHERE `id` = ".(int)$_GET['id']."
	LIMIT 1 
");

$row = $res->fetch_assoc();
$res->close();

$res = q ("
	SELECT *
	FROM `books2authors`
	WHERE `book_id` = ".(int)$_GET['id']."
	ORDER BY `id`
");

$author=array();
while ($row_authorid=$res->fetch_assoc()) {
	$author[]=$row_authorid['author_id'];
}
$res->close();
$author=implode(",",$author);

$res = q("
	SELECT *
	FROM `authors`
	WHERE id IN ($author)
");
$rowauthor=array();
while ($rows = $res->fetch_assoc()) {
	$rowauthor[]=$rows['name'];
}
$res->close();