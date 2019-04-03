<div class="body-page">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="product-add">
			Меню добавления книги
		</div>
		<div>
			<span class="product-text">Наименование:* </span><input type="text" value=
			"<?php if (isset($_POST['name'])) echo hc($_POST['name']); ?>" name="name" size="100" maxlength="100">
		</div>
		<div>
			<span class="product-text">Фото: </span>
		</div>
		<input type="file" name="file" accept="image/jpeg,image/png,image/gif,image/jpg">
		<div>
			<span class="product-text"> Автор:* </span><select size="1" name="author1">
				<option></option>
				<?php while ($row=$res1->fetch_assoc()) {
					echo '<option ';
					if (isset($_POST['author1'])) {
						if ($_POST['author1'] == $row['name']) {
							echo 'selected="selected"';
						}
					}
					echo 'value="'.hc($row['name']).'">'.hc($row['name']).'</option>';
				}
				$res1->close();
				?>
			</select>
		</div>
		<div>
			<span class="product-text"> Автор2: </span><select size="1" name="author2">
				<option></option>
				<?php while ($row=$res2->fetch_assoc()) {
					echo '<option ';
					if (isset($_POST['author2'])) {
						if ($_POST['author2'] == $row['name']) {
							echo 'selected="selected"';
						}
					}
					echo 'value="'.hc($row['name']).'">'.hc($row['name']).'</option>';
				}
				$res2->close();
				?>
			</select>
		</div>
		<div>
			<span class="product-text"> Автор3: </span><select size="1" name="author3">
				<option></option>
				<?php while ($row=$res3->fetch_assoc()) {
					echo '<option ';
					if (isset($_POST['author3'])) {
						if ($_POST['author3'] == $row['name']) {
							echo 'selected="selected"';
						}
					}
					echo 'value="'.hc($row['name']).'">'.hc($row['name']).'</option>';
				}
				$res3->close() ?>
			</select>
		</div>
		<div>
			<span class="product-text">Количество страниц: </span><input type="text" value=
			"<?php if (isset($_POST['size'])) echo (int)$_POST['size']; ?>" name="size" maxlength="10">
		</div>
		<div>
			<span class="product-text">Год: </span><input type="text" value=
			"<?php if (isset($_POST['year'])) echo (int)$_POST['year']; ?>" name="year" maxlength="4">
		</div>
		<div>
			<span class="product-text">Цена:* </span><input type="text" value=
			"<?php if (isset($_POST['price'])) echo (int)$_POST['price']; ?>" name="price" maxlength="10">
		</div>
		<div class="product-textarea-div">
			<span class="product-text">Описание:* </span><br>
			<textarea rows="5" class="product-textarea" name="about"><?php if (isset($_POST['about'])) echo hc($_POST['about']); ?></textarea>
		</div>
		<div class="product-text-note">* обязательные для заполнения поля</div>
		<div class="product-text-note"><?php if (isset($error)) echo '<h2>'.$error.'</h2>'; ?></div>
		<input type="submit" name="add" value="Добавить книгу">
	</form>
</div>