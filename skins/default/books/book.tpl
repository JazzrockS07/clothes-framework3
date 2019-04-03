<div class="body-page">
	<div class="clearfix">
		<div class="book-image">
			<img src="/uploaded/300x450/<?php echo hc($row['img']); ?>">
		</div>
		<div class="book-list">
			<div>
				<span class="product-text">Наименование: </span>
				<?php echo hc($row['name']); ?>
			</div>
			<div>
				<span class="product-text"> Автор: </span>
				<?php foreach($rowauthor as $v) {
					echo '<a href="/books/author?name='.hc($v).'" class="book-author">'.hc($v).'</a>';
				}
				?>
			</div>
			<div>
				<span class="product-text">Количество страниц: </span>
				<?php echo hc($row['size']); ?>
			</div>
			<div>
				<span class="product-text">Год выпуска: </span>
				<?php echo (int)$row['price']; ?>
			</div>
			<div>
				<span class="product-text">Цена: </span>
				<?php echo hc($row['price']); ?> &#8372
			</div>
		</div>
	</div>
	<div class="product-textarea-div">
		<span class="product-text">Описание: </span><br>
		<?php echo hc($row['about']); ?>
	</div>
</div>