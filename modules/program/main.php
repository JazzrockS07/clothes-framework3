<?php

if (isset($_GET['link'])){
	$sub = $_GET['link'];
} else {
	$sub = ".";
}

$dir = scandir ($sub);

//  так проверяем, что попало в массив $dir при переходе по ссылке echo '<pre>'.print_r($dir,1).'</pre>';


