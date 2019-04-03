<?php

$res = q ("
	SELECT COUNT(*)
	FROM `books`
");
$row=$res->fetch_row();
$count = $row[0];
$res->close();


// Пагинация, выборка необходимых по порядку статей на странице
$limit = 4; //количество новостей на странице
if (isset($_GET['num'])) {
	Paginator::$pages=$_GET['num'];
}
Paginator::start_item($limit,$count);
$start_item = Paginator::$start_item;

$res = q ("
	SELECT *
	FROM `books`
	LIMIT $start_item,$limit
");

$books=array();
while ($row=$res->fetch_assoc()) {
	$books[$row['id']] = array (
		'id' => $row['id'],
		'name' => $row['name'],
		'img' => $row['img'],
		'price' => $row{'price'},
		'author' => array(),
	);
	$bookid[]=$row['id'];
}
$res->close();

$bookid=implode(",",$bookid);

$res = q("
	SELECT *
	FROM `books2authors`
	WHERE `book_id` IN ($bookid)
");
while ($row=$res->fetch_assoc()) {
	$authorid[]=$row['author_id'];
}
$res->close();
$authorid=implode(",",$authorid);

$res3 = q("
	SELECT *
	FROM `authors`
	WHERE `id` IN ($authorid)
");

$author=array();
while ($rows = $res3->fetch_assoc()) {
	$author[$rows['id']]= $rows['name'];
}
$res3->close();

$res2 = q ("
	SELECT *
	FROM `books2authors`
	WHERE `book_id` IN ($bookid)
");


while ($row_authorid=$res2->fetch_assoc()) {
	$books[$row_authorid['book_id']]['author'][] = $author[$row_authorid['author_id']];
}
$res2->close();


// Пагинация, вывод пагинатора внизу страницы
Paginator::$howpages=5; //количество показываемых страниц
Paginator::showPaginator();
$page=Paginator::$page; // номер нашей страницы
$total=Paginator::$total; // номер последней страницы
$sidepage=Paginator::$sidepage; // количество страниц влево, вправо от нашей страницы
