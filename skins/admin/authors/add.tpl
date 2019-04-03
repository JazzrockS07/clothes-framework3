<div class="body-page">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="product-add">
			Меню добавления автора книг
		</div>
		<div>
			<span class="product-text">Автор:* </span><input type="text" value=
			"<?php if (isset($_POST['name'])) echo hc($_POST['name']); ?>" name="name" size="100" maxlength="100">
		</div>
		<div>
			<span class="product-text">Фото товара: </span>
		</div>
		<input type="file" name="file" accept="image/jpeg,image/png,image/gif,image/jpg">
		<div class="product-textarea-div">
			<span class="product-text">Об авторе:* </span><br>
			<textarea rows="5" class="product-textarea" name="about"><?php if (isset($_POST['about'])) echo hc($_POST['about']); ?></textarea>
		</div>
		<div class="product-text-note">* обязательные для заполнения поля</div>
		<div class="product-text-note"><?php if (isset($error)) echo '<h2>'.$error.'</h2>'; ?></div>
		<input type="submit" name="add" value="Добавить автора">
	</form>
</div>