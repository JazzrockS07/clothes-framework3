<div class="body-page">
	<form action="" method="post">
		<div class="product-add">
			Меню добавления новости
		</div>
		<div>
			<span class="product-text">Наименование:* </span><input type="text" value=
			"<?php if (isset($_POST['news_name'])) echo hc($_POST['news_name']); ?>" name="news_name" size="100" maxlength="100">
		</div>
		<div>
			<span class="product-text"> Тема новости:* </span><select size="1" name="theme">
				<?php while ($row=$res->fetch_assoc()) {
					echo '<option ';
					if (isset($_POST['theme'])) {
						if ($_POST['theme'] == $row['theme']) {
							echo 'selected="selected"';
						}
					}
					echo 'value="'.hc($row['theme']).'">'.hc($row['theme']).'</option>';
				}
				$res->close() ?>
			</select>
		</div>
		<div class="product-textarea-div">
			<span class="product-text">Новость: </span><br>
			<textarea rows="5" class="product-textarea" name="text"><?php if (isset($_POST['text'])) echo hc($_POST['text']); ?></textarea>
		</div>
		<div class="product-text-note">* обязательные для заполнения поля</div>
		<div class="product-text-note"><?php if (isset($error)) echo '<h2>'.$error.'</h2>'; ?></div>
		<input type="submit" name="add" value="Добавить новость">
	</form>
</div>