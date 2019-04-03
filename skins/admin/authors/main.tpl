<div class="body-page">
	<div class="product-menu">
		Меню управления авторами книг
	</div>
	<?php if (isset($info)) { ?>
		<h1><?php echo $info; ?> </h1>
	<?php } ?>

	<a href="/admin/authors/add">
		<button class="menu-button">Добавить нового автора</button>
	</a>
	<br>

	Все существующие авторы:
	<br>
	<br>

	<form action="" method="post">
		<?php while($row=$authors->fetch_assoc()) { ?>
			<div class="product-main clearfix">
				<div class="product-change">
					<input type="checkbox" name="ids[]" value="<?php echo (int)$row['id']; ?>">
					<a href="/admin/authors/edit&id=<?php echo (int)$row['id']; ?>" class="menu-edit">Редактировать</a>
					<a href="/admin/authors?action=delete&id=<?php echo (int)$row['id']; ?>" class="menu-del">Удалить товар</a>
					<b><?php echo hc($row['name']); ?></b>
				</div>
				<div class="menu-image">
					<?php if (!empty($row['img'])) echo '<img src="/uploaded/100x100/'.hc($row['img']).'">'; ?>
				</div>
			</div>
			<hr>
		<?php }
		$authors->close();
		DB::close(); ?>
		<input type="submit" name="delete" value="Удалить отмеченных авторов" class="menu-button">
	</form>
</div>