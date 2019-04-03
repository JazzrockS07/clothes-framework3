<?php

$res = q("
	SELECT *
	FROM `authors`
	WHERE `name` = '".es($_GET['name'])."'
	LIMIT 1 
");

$row = $res->fetch_assoc();
$res->close();

$res = q ("
	SELECT *
	FROM `books2authors`
	WHERE `author_id` = '".es($row['id'])."'
	ORDER BY `id`
");

$book=array();
while ($row_bookid=$res->fetch_assoc()) {
	$book[]=(int)$row_bookid['book_id'];
}
$res->close();
$book=implode(",",$book);

$res = q("
	SELECT *
	FROM `books`
	WHERE id IN ($book)
");
