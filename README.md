# clothes-framework3

This is my first test work on github

# калькулятор, работа с функциями
modules/calculator/main.php

skins/default/calculator/main.tpl

# игра, работа с сессиями
modules/game/main.php

skins/default/game/main.tpl

# CRUD - create read update delete - работа с базой данных
modules/admin/product/main.php, add.php, edit.php

# регистрация, авторизация и автоавторизация
modules/cab/registration.php, auth.php

# создание админки
modules/admin 

# регулярные выражения
modules/regs/main.php

# создание в админке страницы пользователей с фильтром по логину
modules/admin/users/main.php

# создание класса Uploader для загрузки фото
libs/class_Uploader.php

# создание класса по работе С БД
libs/default.php class DB

# работа с БД один ко многим
modules/news/theme.php

skins/default/news/theme.tpl

# работа с БД многие ко многим, в main.php - работа с пагинатором
/modules/books/main.php, book.php, author.php

skins/default/books/main.tpl, book.tpl, author.tpl


# JS, модальное окно
modules/test/main.php

skins/default/test/main.tpl

# собственные функции JS
skins/default/js/scripts_v1.js

authWindow() - открытие модального окна для ввода данных авторизации

escapeHtml(text) - экранизация вводимых данных

check() - проверка вводимых полей на уровне JS

addComment() - добавление комментария без перезагрузки страницы (AJAX)

chat() - реализация чата с использованием таймера на странице main:

Core::$JS[]='<script>
	window.onload=function() {
		intervalId=setInterval("chat()",20000);
	}
</script>';

# тестирование AJAX
test_ajax.php, test.php

# рализация чата
modules/comments

skins/default/comments

