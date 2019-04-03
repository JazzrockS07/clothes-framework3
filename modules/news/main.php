<?php

$res2 = q("
	SELECT *
	FROM `news_theme`
	ORDER BY `id` DESC
");

$res = q ("
	SELECT COUNT(*)
	FROM `news`
");
$row=$res->fetch_row();
$count = $row[0];
$res->close();


// Пагинация, выборка необходимых по порядку статей на странице
$limit = 1; //количество новостей на странице
if (isset($_GET['num'])) {
	Paginator::$pages=$_GET['num'];
}
Paginator::start_item($limit,$count);
$start_item = Paginator::$start_item;

$result = q ("
	SELECT *
	FROM `news`
	LIMIT $start_item,$limit
");

// Пагинация, вывод пагинатора внизу страницы
Paginator::$howpages=7; //количество показываемых страниц
Paginator::showPaginator();
$page=Paginator::$page; // номер нашей страницы
$total=Paginator::$total; // номер последней страницы
$sidepage=Paginator::$sidepage; // количество страниц влево, вправо от нашей страницы

