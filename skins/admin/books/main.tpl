<div class="body-page">
	<div class="product-menu">
		Меню управления книгами
	</div>
	<?php if (isset($info)) { ?>
		<h1><?php echo $info; ?> </h1>
	<?php } ?>

	<a href="/admin/books/add">
		<button class="menu-button">Добавить новую книгу</button>
	</a>
	<br>

	Все существующие книги:
	<br>
	<br>

	<form action="" method="post">
		<?php while($row=$books->fetch_assoc()) { ?>
			<div class="product-main clearfix">
				<div class="product-change">
					<input type="checkbox" name="ids[]" value="<?php echo (int)$row['id']; ?>">
					<a href="/admin/books/edit&id=<?php echo (int)$row['id']; ?>" class="menu-edit">Редактировать</a>
					<a href="/admin/books?action=delete&id=<?php echo (int)$row['id']; ?>" class="menu-del">Удалить товар</a>
					<b><?php echo hc($row['name']); ?></b>
				</div>
				<div class="menu-price2">
					price: <?php echo (int)$row['price']; ?> &#8372
				</div>
				<div class="menu-image">
					<?php if (!empty($row['img'])) echo '<img src="/uploaded/100x100/'.hc($row['img']).'">'; ?>
				</div>
			</div>
			<hr>
		<?php }
		$books->close();
		DB::close(); ?>
		<input type="submit" name="delete" value="Удалить отмеченные книги" class="menu-button">
	</form>
</div>