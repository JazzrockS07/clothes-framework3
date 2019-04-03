<div class="body-page">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="product-add">
			Меню добавления товара
		</div>
		<div>
			<span class="product-text">Код товара: </span><input type="text" value=
				"<?php if (isset($_POST['code'])) echo hc($_POST['code']); ?>" name="code"  maxlength="20">
		</div>
		<div>
			<span class="product-text">Наименование:* </span><input type="text" value=
				"<?php if (isset($_POST['name'])) echo hc($_POST['name']); ?>" name="name" size="100" maxlength="100">
		</div>
		<div>
			<span class="product-text">Фото товара: </span>
			<?php if (isset($filename)) {
				echo '<img src="/uploaded/100x100/'.hc($filename).'">';
			} elseif (isset($_POST['img'])) {
				echo '<img src="/uploaded/100x100/'.hc($_POST['img']).'">';
			}
			?>
		</div>
		<input type="file" name="file" accept="image/jpeg,image/png,image/gif,image/jpg">
		<input type="submit" name="submit" value="загрузить фото товара">
		<h2><?php if (isset($error['img'])) echo $error['img']; ?></h2>
		<h2><?php if (isset($rezult)) echo $rezult; ?></h2>
		<input type="hidden" value="
			<?php if (isset($filename)) {
			echo hc($filename);
		} elseif (isset($_POST['img'])) {
			echo hc($_POST['img']);
		}
		?>" name="img">
		<div>
			<span class="product-text"> Категория товара: </span><select size="1" name="cat">
				<?php foreach ($category as $v) {
						echo '<option ';
						if (isset($_POST['cat'])) {
							if ($_POST['cat'] == $v) {
						 		echo 'selected="selected"';
							}
						}
						echo 'value="'.$v.'">'.$v.'</option>';
				} ?>
			</select>
		</div>
		<div>
			<span class="product-text">Наличие: </span><select size="1" name="availability">
				<option
					<?php
						if (isset($_POST['availability'])) {
						 	if ($_POST['availability'] == "in stock") echo 'selected="selected"';
						}
					?>
				value="in stock">in stock</option>
				<option
					<?php
						if (isset($_POST['availability'])) {
							if ($_POST['availability'] == "not available") echo 'selected="selected"';
						}
					?>
				value="not available">not available</option>
			</select>
		</div>
		<div>
			<span class="product-text">Цена:* </span><input type="text" value=
				"<?php if (isset($_POST['price'])) echo hc($_POST['price']); ?>" name="price" maxlength="10">
		</div>
		<div>
			<span class="product-text">Производитель: </span><input type="text" value=
				"<?php if (isset($_POST['manufacturer'])) echo hc($_POST['manufacturer']); ?>" name="manufacturer" maxlength="20">
		</div>
		<div>
			<span class="product-text">Товар для женщин/мужчин: </span><select size="1" name="gender">
				<option
					<?php
						if (isset($_POST['gender'])) {
						 	if ($_POST['gender'] == "WOMEN'S") echo 'selected="selected"';
						}
					?>
				value="WOMEN'S">WOMEN'S</option>
				<option
					<?php
						if (isset($_POST['gender'])) {
							if ($_POST['gender'] == "MEN'S") echo 'selected="selected"';
						}
					?>
				value="MEN'S">MEN'S</option>
			</select>
		</div>
		<div class="product-textarea-div">
			<span class="product-text">Описание товара: </span><br>
			<textarea rows="5" class="product-textarea" name="details"><?php if (isset($_POST['details'])) echo hc($_POST['details']); ?></textarea>
		</div>
		<div class="product-text-note">* обязательные для заполнения поля</div>
		<div class="product-text-note"><?php if (isset($error)) echo '<h2>'.$error.'</h2>'; ?></div>
		<input type="submit" name="add" value="Добавить товар">
	</form>
</div>