<div class="body-page">
	<form action="" method="post">
		<div class="product-add">
			Меню редактирования темы новостей
		</div>
		<div>
			<span class="product-text">Тема:* </span><input type="text" value=
			"<?php echo hc($row['theme']); ?>" name="theme" size="100" maxlength="100">
		</div>
		<div class="product-text-note">* обязательные для заполнения поля</div>
		<div class="product-text-note"><?php if (isset($error)) echo '<h2>'.$error.'</h2>'; ?></div>
		<input type="submit" name="ok" value="Редактировать тему">
	</form>
</div>