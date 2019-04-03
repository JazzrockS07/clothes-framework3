<div class="body-page">
	<div class="product-menu">
		Меню управления новостями
	</div>
	<?php if (isset($info)) { ?>
		<h1><?php echo $info; ?> </h1>
	<?php } ?>

	<a href="/admin/news/add">
		<button class="menu-button">Добавить новую новость</button>
	</a>
	<br>

	Все новости:
	<br>
	<br>

	<form action="" method="post">
		<?php while($row=$news->fetch_assoc()) { ?>
			<div>
				<input type="checkbox" name="ids[]" value="<?php echo (int)$row['id']; ?>">
				<a href="/admin/news/edit&id=<?php echo (int)$row['id']; ?>" class="menu-edit">Редактировать</a>
				<a href="/admin/news?action=delete&id=<?php echo (int)$row['id']; ?>" class="menu-del">Удалить новость</a>
				<b><?php echo hc($row['news_name']); ?></b>
				<span class="menu-price"><?php echo hc($row['theme']); ?></span>
			</div>
			<hr>
		<?php }
		$news->close();
		DB::close(); ?>
		<input type="submit" name="delete" value="Удалить отмеченные новости" class="menu-button">
	</form>
</div>