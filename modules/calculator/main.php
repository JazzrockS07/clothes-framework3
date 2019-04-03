<?php

if (isset($_POST['number1'],$_POST['number2'])) {
	if (isset($_POST['action'])) {
		$rezult = calc((int)$_POST['number1'], (int)$_POST['number2'], $_POST['action']);
	} else {
		$rezult = calc((int)$_POST['number1'], (int)$_POST['number2']);
	}

}

function calc($num1,$num2,$act='+') {
	if ($act == '+') {
		return $num1+$num2;
	} elseif ($act == '-') {
		return $num1-$num2;
	} elseif ($act == '*') {
		return $num1*$num2;
	} elseif ($act == ':') {
		if ($num2 == 0) {
			return 'на ноль делить нельзя';
		} else {
			return $num1/$num2;
		}
	}

}

