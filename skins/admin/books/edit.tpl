<div class="body-page">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="product-add">
			Меню редактирования данных книги
		</div>
		<div>
			<span class="product-text">Наименование:* </span><input type="text" value=
			"<?php echo hc($row['name']); ?>" name="name" size="100" maxlength="100">
		</div>
		<div>
			<span class="product-text">Фото: </span>
			<?php if (!empty($row['img'])) {
				echo '<img src="/uploaded/100x100/'.hc($row['img']).'">';
			}
			?>
		</div>
		<input type="file" name="file" accept="image/jpeg,image/png,image/gif,image/jpg">
		<div>
			<span class="product-text"> Автор:* </span><select size="1" name="author1">
				<option></option>
				<?php while ($row2=$res1->fetch_assoc()) {
					echo '<option ';
					if ($row2['name'] == $rowauthor['0']) {
						echo 'selected="selected"';
					}
					echo 'value="'.hc($row2['name']).'">'.hc($row2['name']).'</option>';
				}
				?>
			</select>
		</div>
		<div>
			<span class="product-text"> Автор2: </span><select size="1" name="author2">
				<option></option>
				<?php while ($row2=$res2->fetch_assoc()) {
					echo '<option ';
					if (isset($rowauthor['1'])) {
						if ($row2['name'] == $rowauthor['1']) {
							echo 'selected="selected"';
						}
					}
					echo 'value="'.hc($row2['name']).'">'.hc($row2['name']).'</option>';
				}
				?>
			</select>
		</div>
		<div>
			<span class="product-text"> Автор3: </span><select size="1" name="author3">
				<option></option>
				<?php while ($row2=$res3->fetch_assoc()) {
					echo '<option ';
					if (isset($rowauthor['2'])) {
						if ($row2['name'] == $rowauthor['2']) {
							echo 'selected="selected"';
						}
					}
					echo 'value="'.hc($row2['name']).'">'.hc($row2['name']).'</option>';
				}
				$res->close() ?>
			</select>
		</div>
		<div>
			<span class="product-text">Количество страниц: </span><input type="text" value=
			"<?php echo (int)$row['size']; ?>" name="size" maxlength="10">
		</div>
		<div>
			<span class="product-text">Год: </span><input type="text" value=
			"<?php echo (int)$row['year']; ?>" name="year" maxlength="4">
		</div>
		<div>
			<span class="product-text">Цена:* </span><input type="text" value=
			"<?php echo (int)$row['price']; ?>" name="price" maxlength="10">
		</div>
		<div class="product-textarea-div">
			<span class="product-text">Описание:* </span><br>
			<textarea rows="5" class="product-textarea" name="about"><?php echo hc($row['about']); ?></textarea>
		</div>
		<div class="product-text-note">* обязательные для заполнения поля</div>
		<div class="product-text-note"><?php if (isset($error)) echo '<h2>'.$error.'</h2>'; ?></div>
		<input type="submit" name="add" value="Изменить данные о книге">
	</form>
</div>