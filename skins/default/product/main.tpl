<div class="body-page">
	<div class="product-menu">
		Все товары
	</div>

	<br>

	<?php while($row=mysqli_fetch_assoc($product)) { ?>
		<div class="clearfix">
			<div class="product-image">
				<img src="/uploaded/225x270/<?php echo hc($row['img']); ?>">
			</div>
			<div class="product-list">
				<div>
					<span class="product-text">Код товара: </span>
					<?php echo hc($row['code']); ?>
				</div>
				<div>
					<span class="product-text">Наименование:* </span>
					<?php echo hc($row['name']); ?>
				</div>
				<div>
					<span class="product-text"> Категория товара: </span>
					<?php echo hc($row['cat']); ?>
				</div>
				<div>
					<span class="product-text">Наличие: </span>
					<?php echo hc($row['availability']); ?>
				</div>
				<div>
					<span class="product-text">Цена,USD:* </span>
					<?php echo (int)$row['price']; ?>
				</div>
				<div>
					<span class="product-text">Производитель: </span>
					<?php echo hc($row['manufacturer']); ?>
				</div>
				<div>
					<span class="product-text">Товар для женщин/мужчин: </span>
					<?php echo hc($row['gender']); ?>
				</div>
			</div>
		</div>
		<div class="product-textarea-div">
			<span class="product-text">Описание товара: </span><br>
			<?php echo hc($row['details']); ?>
		</div>
		<hr>
	<?php } ?>
</div>