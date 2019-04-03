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
	<script type="text/javascript" src="/skins/default/js/scripts_v1.js"></script>
	<script src="/skins/default/js/jquery-3.3.1.js"></script>
</head>

<body>
<header>
	<div class="header clearfix">
		<div class="col1">
			<div class="adress">28 Jackson Blvd Ste 1020 Chicago IL 60604-2340</div><br>
			<div class="tel">(800)2345-6789</div>
		</div>
		<div class="col2">
			<img src="/img/logo.png" alt="logo">
		</div>
		<div class="col3">
			<div class="clearfix">
				<div class="currencylogin">
					<div class="currency">
						<?php if(!isset($_SESSION['user'])) {
							echo '<a href = "/cab/registration" > Регистрация</a >';
						} ?>
					</div>
					<div class="login">
						<?php if(!isset($_SESSION['user'])) {
							echo '<div id="authcursor" onclick="authWindow();">Авторизация</div>';
						} else {
							echo '<a href="/cab/user">Ваш аккаунт</a>';
						} ?>
						<div id="auth" class="authWindow">
							<form onsubmit="return check();" action="/cab/auth" method="post">
								<table class="auth-table2">
									<tr>
										<td>Логин </td>
										<td><input type="text" id="key1" name="login"></td>
									</tr>
									<tr>
										<td></td>
										<td id="err1"></td>
									</tr>
									<tr>
										<td>Пароль </td>
										<td><input type="password" id="key2" name="pass"></td>
									</tr>
									<tr>
										<td></td>
										<td id="err2"></td>
									</tr>
								</table>
								<br>
								Запомнить меня: <input type="checkbox" name="autoauth">
								<br>
								<br>
								<input type="submit" name="submit" value="Вход">
							</form>
						</div>
					</div>
				</div>
				<div class="spritekorzina">
				</div>
			</div>
		</div>
	</div>

	<div class="menusearch clearfix">
		<nav class="main-menu">
			<a href="/" class="active">home</a>
			<div>
				catalog
				<img src="/img/strmenu.jpg">
				<div class="drop-menu clearfix">
					<div class="dropwomens">
						<div class="womensspan">WOMEN'S</div>
						<div class="clearfix">
							<div class="drop-menu-choise">
								<a href="/product"><h2 class="h2-text">HOODIES & SWEATSHIRTS</h2></a>
								<a href="/product"><h2 class="h2-text">ACCESSORIES</h2></a>
								<a href="/product"><h2 class="h2-text">COATS & JACKETS</h2></a>
								<a href="/product"><h2 class="h2-text">DRESSES</h2></a>
								<a href="/product"><h2 class="h2-text">DENIM</h2></a>
								<a href="/product"><h2 class="h2-text">JEWELLERY & WATCHES</h2></a>
								<a href="/product"><h2 class="h2-text">GIFTS</h2></a>
							</div>
							<div class="drop-menu-choise">
								<a href="/product"><h2 class="h2-text">SKIRTS</h2></a>
								<a href="/product"><h2 class="h2-text">SHOES</h2></a>
								<a href="/product"><h2 class="h2-text">SHORTS</h2></a>
								<a href="/product"><h2 class="h2-text">JUMPERS & CARDIGANS</h2></a>
								<a href="/product"><h2 class="h2-text">MATERNITY</h2></a>
								<a href="/product"><h2 class="h2-text">SHIRTS & BLOUSES</h2></a>
								<a href="/product"><h2 class="h2-text">PETITE</h2></a>
							</div>
						</div>
					</div>
					<div class="dropmens">
						<div class="mensspan">MEN'S</div>
						<div class="clearfix">
							<div class="drop-menu-choise">
								<a href="/product">ACCESSORIES</a><br>
								<a href="/product">COATS & JACKETS</a><br>
								<a href="/product">HOODIES & SWEATSHIRTS</a><br>
								<a href="/product">DENIM</a><br>
								<a href="/product">SHIRTS & BLOUSES</a><br>
								<a href="/product">JEWELLERY & WATCHES</a><br>
								<a href="/product">TROUSERS</a><br>
							</div>
							<div class="drop-menu-choise">
								<a href="/product">SHORTS</a><br>
								<a href="/product">SOCKS & TIGHTS</a><br>
								<a href="/product">SHOES</a><br>
								<a href="/product">SUITS & SEPARATES</a><br>
								<a href="/product">SWIMWEAR</a><br>
								<a href="/product">SLEEPWEAR</a><br>
								<a href="/product">UNDERWEAR</a><br>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a href="/comments">comments</a>
			<a href="/game">game</a>
			<a href="/program">file manager</a>
			<a href="/calculator">calculator</a>
			<a href="/news">новости</a>
			<a href="/books">книги</a>
			<?php if(isset($_SESSION['user'])){
			  	echo '<a href="/cab/exit">ВЫХОД</a>';
			}
			?>
		</nav>
		<div class="search">
			<form action="" method="get">
				<input type="text" name="search" value="search" class="search-text" size="10">
				<input type="image" src="/img/search.png" class="search-img">
			</form>
		</div>
	</div>
</header>

<main>
	<div id="content">
    	<?php echo $content; ?>
	</div>
</main>

<footer>
	<div class="footer clearfix">
		<div class="col5">
			<img src="/img/logo2.png" alt="logo">
		</div>
		<div class="adress2">28 Jackson Blvd Ste 1020 Chicago IL 60604-2340</div>
		<div class="tel2-copyright">
			<div class="clearfix">
				<span class="tel2">(800)2345-6789</span>
				<a href="#" class="twitter"></a>
				<a href="#" class="facebook"></a>
			</div>
			<div class="copyright-policy">
				<span class="copyright">Jazzrock ©2018</span>
				<a href="#" class="privacy-policy">Privacy Policy</a>
			</div>
		</div>
	</div>
</footer>
<div class="star">
</div>

</body>
</html>