<div class="body-page">
	<div class="product-menu">
		Меню управления товарами
	</div>
	<?php if (isset($info)) { ?>
		<h1><?php echo $info; ?> </h1>
	<?php } ?>

	<a href="/admin/product/add">
		<button class="menu-button">Добавить новый товар</button>
	</a>
	<br>

	Все существующие товары:
	<br>
	<br>

	<form action="" method="post">
		<?php while($row=mysqli_fetch_assoc($product)) { ?>
		<div class="product-main clearfix">
			<div class="product-change">
				<input type="checkbox" name="ids[]" value="<?php echo (int)$row['id']; ?>">
				<a href="/admin/product/edit&id=<?php echo (int)$row['id']; ?>" class="menu-edit">Редактировать</a>
				<a href="/admin/product?action=delete&id=<?php echo (int)$row['id']; ?>" onClick="return areYouSure();" class="menu-del">Удалить товар</a>
				<b><?php echo hc($row['name']); ?></b>
			</div>
			<div class="menu-price2">
				price: <?php echo (int)$row['price']; ?> $
			</div>
			<div class="menu-image">
				<?php if (!empty($row['img'])) echo '<img src="/uploaded/100x100/'.hc($row['img']).'">'; ?>
			</div>
		</div>
		<hr>
		<?php } ?>
		<input type="submit" name="delete" value="Удалить отмеченные товары" onClick="return areYouSure();" class="menu-button">
	</form>
</div>