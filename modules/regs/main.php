<?php

/**
 *	Задачник. После каждого $array мы ОБЯЗАНЫ написать прям тут нужный нам код. Прогнать массив $array через foreach и обработать по заданию из $q.
 *	$q - массивы, то есть могут содержать несколько заданий, каждый из которых будет работать с имеющимся массивом
 *	Если у нас в задаче замена, но мы производим замену и выводим: $text = preg_replace('что','на что',$text),
 *	Если у нас в задаче поиск, то производим проверку через if-else и выводим: строку
 *	echo 'В такой-то строке: '.htmlspecialchars($array[$k]).' регулярка прошла УСПЕШНО или НЕ УСПЕШНО (подставить в if-else)';
 *	и если у нас поиск, то дополнительно вывести весь массив $matches, И нужную найденную строку, если нам надо её получить echo $matches[0][1] <- пример
 *  Задачки подготовил Inpost специально для курсов. Дата: 5 января 2012 года
 *	skype: imbalance_hero , пишите :)
 */

/**
 *	Подсказки:
 *	^ - начало строки, если указали, то проверка идёт от начала!
 *	$ - конец строки
 *	\s - пробел
 *	\t - табуляция
 *	* - {0,}
 *	+ - {1,}
 *	. - любой символ!
 *	Модификаторы:
 *	u - работаем в кодировке UTF-8
 *	i - регистронезависимый текст
 *	U - отмена жадного поиска
 *	Общие данные:
 *	[] - область допустимых символов в КОНКРЕТНОМ символе. [a-z]{3} <- 3 символа любых из a-z, вплоть даже до 3-х повторяющихся
 *	{} - количество символов, если не стоит, значит 1 символ! Если записано одно число, то РОВНОЕ значение, если 2, то min,max
 *	() - логические скобки И/ИЛИ карман, куда попадают данные
 */


$array = array(
	'Ваш логин: Inpost. Добро пожаловать',
	'Ваш логин: Николай. Добро пожаловать',
	'Ваш логин: Анна Семинович. Добро пожаловать',
	'Ваш логин: Борис_Бурда-2. Добро пожаловать',
);

$q = 'Поиском достать логин. 
      Особенности: логин стоит после двухиточия, может представлять из себя рус и англ символы, пробелы, тире и подчеркивание. 
	  Для для того, чтобы достать чистый логин, воспользуемся карманом (скобками)';


echo '<h3>Задача: достать логин</h3>';
foreach($array as $text) {
	$count = preg_match('#логин:\s([\w\d-\s]+)\.#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Чистый логин: '.htmlspecialchars($matches[1]).'</b><br>';
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}



$array = array(
	'main',
	'READ',
	'news"&\\/files',
	'../../index',
	'news',
	'kill_crash-and-destroy',
	'loveYou',
);

$q = 'Проверить допустимые имена файлов
      Важно заметить, что мы в юникс-системе будем использовать как большие, так и маленькие символы.
	  Необходимо недопустить попадания ТОЛЬКО запрещенных файловой системой имён, а так же попытки перейти между каталогами';

echo '<h3>Задача с допустимыми именами файлов</h3>';
foreach($array as $text) {
	$simbol = preg_quote ('"\/:*?<>|+%!@');
	$count = preg_match_all('#['.$simbol.']|\.\s#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Это имя запрещено файловой системой</b>';
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
		echo '<b>Это имя разрешено файловой системой</b>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}


$array = array(
	'file.jpg',
	'zzz.png',
	'afafaf.php',
	'quad.jpg.',
	'quad2.JPG',
	'quad3.jpg.vir',
	'gif.doc',
	'file.virus',
);

$q = 'Загрузка фотографий. Необходимо допустить ТОЛЬКО: jpg,png,gif расширения
	  Важной особенностью будет то, что поиск лучше осуществлять с конца строки $ .
	  Интересный момент, что можно попасться на ошибку Попова :)';


echo '<h3>Задача с файлами фотографий</h3>';
foreach ($array as $text) {
	$count = preg_match_all('#\.(jpe?g|png|gif)$#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Файл фотографии: '.$text.'</b><br>';
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}


$array = array(
	'Длинная строка. Главное, что мы научимся с ней идеально работать.  HOW do you do? Вот так и живём.Классно!',
);

$q = array(
	'Одна строка, заданий много:',
	'Получить все слова. Самая простая регулярка, поиск по всей строке, указать надо лишь допустимые символы и количество',
	'Получить все английские слова.',
	'Получить слова, которые стоят после точки. Обращаю внимание, что пробел после точки может БЫТЬ и даже не один, а может и не быть, символ пробела: \s',
	'Необходимо получить 5 символ от начала строки. Начало строки: ^ , и не забудем использовать кармашек, чтобы туда ушел нужный нам символ',
	'Получить все слова, в которых первым символ будет начинаться с большой буквы. Подсказка, необходимо использовать 2 квадратных скобки!',
);

echo '<h3>Задачи с длинной строкой</h3>';
foreach ($array as $k1 => $text) {
	$count = preg_match_all('#\w+#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Найденные слова:</b><br>';
		foreach ($matches[$k1] as $k2 => $word) {
				echo htmlspecialchars($word).'<br>';
		}
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

foreach ($array as $k1 => $text) {
	$count = preg_match_all('#[a-z]+#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Найденные английские слова:</b><br>';
		foreach ($matches[$k1] as $k2 => $word) {
			echo htmlspecialchars($word).'<br>';
		}
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

foreach ($array as $k1 => $text) {
	$count = preg_match_all('#\.\s*(\w+)#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Найденные слова после точки:</b><br>';
		foreach ($matches[1] as $k2 => $word) {
			echo htmlspecialchars($word).'<br>';
		}
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

foreach ($array as $k1 => $text) {
	$count = preg_match('#^.{4}(.)#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Найденный 5 символ:</b><br>';
		echo htmlspecialchars($matches[1]);
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

foreach ($array as $k1 => $text) {
	$count = preg_match_all('#[A-ZА-ЯЁ]\w*#u',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Найденные слова с первой большой буквой:</b><br>';
		foreach ($matches[$k1] as $k2 => $word) {
			echo htmlspecialchars($word).'<br>';
		}
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

$array = array(
	'10 , 22, 2.1, 10.11.12.13, 2.5, 10.10, 500.1, 77, 10.11.12.13',
);

$q = array(
	'Достать ВСЕ дробные числа. Дробные - это числа, разделенные точкой',
);

echo '<h3>Задача с дробными числами</h3>';
foreach ($array as $k1 => $text) {
	$count = preg_match_all('#[^\.^\d](\d+\.\d+)[\,$]#ui',$text,$matches);
	// можно было (^|\s|\,)(\d+\.\d+)($|\,\s)
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Найденные дробные числа:</b><br>';
		foreach ($matches[1] as $k2 => $word) {
			echo htmlspecialchars($word).'<br>';
		}
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

$array = array(
	'site.ru',
	'barakuda',
	'zimbabwe_ru',
	'zimbabwe',
	'zzz-zimbabwe',
	'http://site.ru',
	'www.site.com',
	'www.zimbabwe.com',
	'zimbabwe.com.ua',
	'http://zimbabwe.ru',
);

$q = array(
	'Получить ссылки на реальные сайты (обязательно доменное имя), где имя сайта zimbabwe',
	'Немного сложная работа со строкой. Осуществить проверку каждого слова на присутствие в начале http://, и там, где его нет - дописать.
	 Для этих целей используем обход цикла foreach, и проверку preg_match. Не забываем про экранизацию при помощи preg_quote',
	'Похожее задание, но для сайтов, где не указано доменное имя - дописать .ru, это продолжение предыдущего задания, делается так же само, в одном цикле, просто 2 отдельных условия!',
);

echo '<h3>Задача с ссылками</h3>';
foreach ($array as $text) {
	$count = preg_match('#^(|www\.|http://|https://)zimbabwe\.(com|com.ua|ru)$#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Найдена ссылка с именем сайта zimbabwe:</b><br>'.htmlspecialchars($matches[0]);
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

echo '<h3>Первоначальный массив:</h3>';
echo '<pre>'.print_r($array,1).'</pre>';
foreach ($array as $k => $text) {
	$www = preg_quote('www.');
	$http = preg_quote('http://');
	$https = preg_quote('https://');
	$com = preg_quote('.com');
	$comua = preg_quote('.com.ua');
	$ru = preg_quote('.ru');
	$count = preg_match('#^(|'.$http.'|'.$https.')(|'.$www.')[\w\d-]+(|'.$com.'|'.$comua.'|'.$ru.')$#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Найдена ссылка или часть ссылки:</b><br>'.htmlspecialchars($matches[0]);
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	if (empty($matches[1])) {
		$text = preg_replace ('#^(.+)$#ui','http://\\1',$text);
	}
	if (empty($matches[3])) {
		$text = preg_replace ('#^(.+)$#ui','\\1.ru',$text);
	}
	$array[$k] = $text;
	echo '<br><b>Эта ссылка или часть ссылки была преобразована в следующий вид:</b><br>'.$text;
	echo '<pre>'.print_r($matches,1).'</pre>';
}
echo '<h3>Полученный массив:</h3>';
echo '<pre>'.print_r($array,1).'</pre>';


$array = array(
	'inpost',
	'Barabulka_ru',
	'Zimbabwe.ru',
	'Max',
	'Yojik',
	'Иван Тарасов',
	'Ёжик',
	'Борис Николаевич Кощуновский',
	'Ооооооооооооооооооооочень длинное имя',
	'Я',
	'go->drink->die',
	'Don`t sleep',
	'<Пивасик',
	'1',
	'123456789',
	'77777',
	'7ф777я7',
);

$q = array(
	'Теперь идут операции по работе с логинами и паролями. Очень важно именно при РЕГИСТРАЦИИ:',
	'Проверка на preg_match, разрешить только числам. Подсказка: числа точно так же как и буквы, а именно 0-9 (а-я)',
	'Пропустить только строки, состоящие из цифр 7 и символов ф,я',
	'Пропустить только рус и англ символы, подчеркивание и тире, пробел(!) длиной от 4 до 15 символов',
	'Выбрать логин, который начинается на M и заканчивается на x , я говорю про Max',
);

echo '<h2>Задача с логинами-только числами</h2>';
foreach ($array as $text) {
	echo '<br>';
	if (preg_match('#^[0-9]+$#ui',$text)) {
		echo 'логин "'.htmlspecialchars($text).'" <b>верный</b>';
	}	else {
		echo 'логин "'.htmlspecialchars($text).'" неверный';
	}
}

echo '<h2>Задача с логинами из 7,ф,я</h2>';
foreach ($array as $text) {
	echo '<br>';
	if (preg_match('#^[7фя]+$#ui',$text)) {
		echo 'логин "'.htmlspecialchars($text).'" <b>верный</b>';
	}	else {
		echo 'логин "'.htmlspecialchars($text).'" неверный';
	}
}

echo '<h2>Задача с логинами из рус и англ символы, подчеркивание и тире, пробел(!) длиной от 4 до 15 символов</h2>';
foreach ($array as $text) {
	echo '<br>';
	if (preg_match('#^[а-яёa-z\-\_\s]{4,15}$#ui',$text)) {
		echo 'логин "'.htmlspecialchars($text).'" <b>верный</b>';
	}	else {
		echo 'логин "'.htmlspecialchars($text).'" неверный';
	}
}

echo '<h2>Задача с логином, который начинается на M и заканчивается на x</h2>';
foreach ($array as $text) {
	echo '<br>';
	if (preg_match('#^M.*x$#u',$text)) {
		echo 'логин "'.htmlspecialchars($text).'" <b>верный</b>';
	}	else {
		echo 'логин "'.htmlspecialchars($text).'" неверный';
	}
}

$array = array(
	'Я тебя ооооочеень            СИЛЬНО            ЛЮБЛЮ          МОЙ                    ДругБорис! Цёми-Цёми,    Пративный!',
);

$q = array(
	'Вчера писал для себя. Заменить подряд идущие пробелы на один. Чтобы не было их так много. preg_replace',
);

echo '<h3>Задача: Заменить подряд идущие пробелы на один. Чтобы не было их так много.</h3>';
echo 'Исходный массив:<pre>'.print_r($array,1).'</pre>';
foreach($array as $k => $text) {
	$text = preg_replace('#\s+#ui',' ',$text);
	$array[0] = $text;
}
echo 'Полученный массив:<pre>'.print_r($array,1).'</pre>';




$array = array(
	'Дата публикации:27 августа 08:43. Был отличный год!',
);

$q = array(
	'Строку мы знаем, меняется лишь день,месяц,время. Необходимо достать:',
	'Время, когда опубликовали',
	'Полностью дату, а именно (27 августа 08:43), она может меняться!',
);

echo '<h3>Задача: найти время публикации</h3>';
foreach($array as $text) {
	$count = preg_match('#публикации:[0-9]{1,2}\s[\w]+\s(.{5})#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Время публикации: '.htmlspecialchars($matches[1]).'</b><br>';
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

echo '<h3>Задача: найти дату публикации</h3>';
foreach($array as $text) {
	$count = preg_match('#публикации:([0-9]{1,2}\s[\w]+\s.{5})#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Дата публикации: '.htmlspecialchars($matches[1]).'</b><br>';
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

$array = array(
	'<a href="file.php">Это ссылка, и тут было классно</a>',
	'<a    href     =       "file.php"     >Это ссылка, и тут было классно</a>',
	'<a    href=file.php >Это ссылка, и тут было классно</a>',
	"<a    href='file.php' >Это ссылка, и тут было классно</a>",
);

$q = array(
	'Используем карманы, необходимо получить путь, куда ссылается и текст внутри тега!
	 Стоит обратить внимание на момент, где символ МОЖЕТ БЫТЬ, а может и не БЫТЬ',
);

echo '<h3>Задача: найти ссылку и текст</h3>';
foreach($array as $text) {
	$count = preg_match('#=(|\s+\"|\'|\"|\s)([a-z.]+)(|\s+\"|\'\s|\"|\s|\"\s+)>(.+)<#ui',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Путь: '.htmlspecialchars($matches[2]).'</b><br>';
		echo '<b>Текст: '.htmlspecialchars($matches[4]).'</b><br>';
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}

$array = array(
	'text@',
	'yandex@@mega.com',
	'beer@mail.com',
	"inpost.dp.ua",
	"inpostdpua@gmail.com",
);

$q = array(
	'Проверить на валидность е-мейла. Краткая информация (ВАЖНАЯ!), емеил состоит из набора символов маленьких. 
	 Присутствует в центре собака, слева имя ящика, которое может состоять из обычных символов англ И подчеркивания И тире.
	 Справа находятся домены, отделенные точками.',
);

echo '<h3>Задача: проверить на валидность email</h3>';
foreach($array as $text) {
	$count = preg_match('#[a-z\-\_]+@[a-z]+\.(com|ua)#u',$text,$matches);
	if ($count!=0) {
		echo '<br>В строке "'.htmlspecialchars($text).'" регулярка прошла УСПЕШНО<br>';
		echo '<b>Валидный email: '.htmlspecialchars($matches[0]).'</b>';
	} else {
		echo 'В строке "'.htmlspecialchars($text).'" регулярка прошла НЕУСПЕШНО<br>';
	}
	echo '<pre>'.print_r($matches,1).'</pre>';
}