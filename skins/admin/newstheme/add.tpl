<div class="body-page">
	<form action="" method="post">
		<div class="product-add">
			Меню добавления темы новости
		</div>
		<div>
			<span class="product-text">Тема новости:* </span><input type="text" name="theme" size="100" maxlength="100">
		</div>
		<div class="product-text-note">* обязательные для заполнения поля</div>
		<div class="product-text-note"><?php if (isset($error)) echo '<h2>'.$error.'</h2>'; ?></div>
		<input type="submit" name="add" value="Добавить тему">
	</form>
</div>