<div class="body-page">
	<form action="" method="post">
		<div class="product-add">
			Меню редактирования новости
		</div>
		<div>
			<span class="product-text">Наименование:* </span><input type="text" value=
			"<?php echo hc($row['news_name']); ?>" name="news_name" size="100" maxlength="100">
		</div>
		<div>
			<span class="product-text"> Тема новости:* </span><select size="1" name="theme">
				<?php while ($row2=$res2->fetch_assoc()) {
					echo '<option ';
					if ($row2['theme'] == $row['theme']) {
							echo 'selected="selected"';
					}

					echo 'value="'.hc($row2['theme']).'">'.hc($row2['theme']).'</option>';
				}
				$res2->close() ?>
			</select>
		</div>
		<div class="product-textarea-div">
			<span class="product-text">Новость: </span><br>
			<textarea rows="5" class="product-textarea" name="text"><?php echo hc($row['text']); ?></textarea>
		</div>
		<div class="product-text-note">* обязательные для заполнения поля</div>
		<div class="product-text-note"><?php if (isset($error)) echo '<h2>'.$error.'</h2>'; ?></div>
		<input type="submit" name="ok" value="Редактировать новость">
	</form>
</div>