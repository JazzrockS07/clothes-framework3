<?php
error_reporting(-1);
header('Content-Type:text/html;charset=utf-8');

/*sleep(10);
echo 'Это пришел ответ со страницы test_ajax.php';
foreach($_POST as $k=>$v) {
	echo ' '.$k.' = '.$v.' ';
}*/

$array = array (
	'name' => 'Alex',
	'F'	=> 'test'
);
echo json_encode($array);