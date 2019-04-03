<?php


$res = q("
	SELECT *
	FROM `news`
	WHERE `theme` = '".es($_GET['theme'])."'
	ORDER BY `id` DESC 
");
