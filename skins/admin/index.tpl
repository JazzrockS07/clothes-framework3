<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?php echo hc(Core::$META['title']); ?></title>
	<meta name="description" content="<?php echo hc(Core::$META['description']); ?>">
	<meta name="keywords" content="<?php echo hc(Core::$META['keywords']); ?>">
	<link href="/css/style.css" rel="stylesheet" type="text/css">
	<link href="/css/normalize.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if (count(Core::$CSS)) {echo implode("\n",Core::$CSS);} ?>
	<?php if (count(Core::$JS)) {echo implode("\n",Core::$JS);} ?>
	<script>
		function areYouSure() {
			return confirm ('Вы уверены, что хотите удалить?');
		}
	</script>
</head>

<body>
<header>
	<div class="header clearfix">
		<div class="logo2">
			<img src="/skins/admin/img/control_panel_98186.jpg" class="admin-icon" alt="logo2">
		</div>
		<div class="admin-text">
			ADMIN PANEL
		</div>
	</div>

	<?php if (isset($_SESSION['user']) && $_SESSION['user']['access'] == 5) { ?>
	<div class="menusearch clearfix">
		<nav class="main-menu">
			<a href="/admin/product">Товары</a>
			<a href="/admin/users">Пользователи</a>
			<a href="/admin/news">Новости</a>
			<a href="/admin/newstheme">Темы новостей</a>
			<a href="/admin/books">Книги</a>
			<a href="/admin/authors">Авторы</a>
			<a href="/" >Выход</a>
		</nav>
	</div>
	<?php } ?>

</header>

<main>
	<div id="content">
    	<?php echo $content; ?>
	</div>
</main>

<footer>
	<div class="footer copyright-policy">
		<span class="copyright">Jazzrock ©2018</span>
		<a href="#" class="privacy-policy">Privacy Policy</a>
	</div>
</footer>
<div class="star">
</div>

</body>
</html>