<div class="body-page">
	<div class="product-menu">
		Меню управления темами новостей
	</div>
	<?php if (isset($info)) { ?>
		<h1><?php echo $info; ?> </h1>
	<?php } ?>

	<a href="/admin/newstheme/add">
		<button class="menu-button">Добавить новую тему</button>
	</a>
	<br>

	Все темы новостей:
	<br>
	<br>

	<form action="" method="post">
		<?php while($row=$res->fetch_assoc()) { ?>
			<div>
				<input type="checkbox" name="ids[]" value="<?php echo (int)$row['id']; ?>">
				<a href="/admin/newstheme/edit&id=<?php echo (int)$row['id']; ?>" class="menu-edit">Редактировать</a>
				<a href="/admin/newstheme?action=delete&id=<?php echo (int)$row['id']; ?>" class="menu-del">Удалить тему</a>
				<b><?php echo hc($row['theme']); ?></b>
			</div>
			<hr>
		<?php }
		$res->close();
		DB::close(); ?>
		<input type="submit" name="delete" value="Удалить отмеченные темы" class="menu-button">
	</form>
</div>