<div class="body-page">
	<div class="clearfix">
		<div class="author-image">
			<img src="/uploaded/300x300/<?php echo hc($row['img']) ?>">
		</div>
		<div class="author-list">
			<span class="product-text">Имя: </span>
			<?php echo hc($row['name']); ?><br>
			<span class="product-text">Об авторе: </span><br>
			<?php echo hc($row['about']); ?>
		</div>
	</div>
	<br>
	<div class="clearfix">
		<?php while($row=$res->fetch_assoc()) { ?>
			<div class="book-block2">
				<a href="/books/book&id=<?php echo(int)$row['id']; ?>">
					<img src="/uploaded/300x450/<?php echo hc($row['img']); ?>">
				</a>
				<div class="clearfix">
					<a href="#" class="book-text">
						<?php echo hc($row['name']); ?>
					</a>
					<div class="book-price">
						<?php echo (int)$row['price']; ?> &#8372
					</div>
				</div>
			</div>
		<?php }
		$res->close(); ?>
	</div>
</div>