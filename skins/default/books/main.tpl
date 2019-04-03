<div class="body-page">
	<div class="product-menu">
		Книги
	</div>

	<div class="clearfix">
		<?php foreach($books as $v) { ?>
			<div class="book-block" class="clearfix">
				<div class="book-foto">
					<a href="/books/book&id=<?php echo(int)$v['id']; ?>">
						<img src="/uploaded/300x450/<?php echo hc($v['img']); ?>">
					</a>
					<div class="clearfix">
						<a href="/books/book&id=<?php echo(int)$v['id']; ?>" class="book-text">
							<?php echo hc($v['name']); ?>
						</a>
						<div class="book-price">
							<?php echo (int)$v['price']; ?> &#8372
						</div>
					</div>
				</div>
				<div class="book-authors">
					<span class="product-text"> Автор: </span> <br>
					<?php foreach($v['author'] as $val) {
						echo '<a href="/books/author?name='.hc($author[$val]).'" class="book-author">'.hc($author[$val]).'</a><br>';
					}
					?>
				</div>
			</div>
		<?php } ?>
	</div>


	<div class="paginator">
		<?php
		if ($page != 1) {
			$number=$page-1;
			echo '<a href= ./'.$_GET['module'].'?num='. $number.'><</a>  ';
			echo '<a href= ./'.$_GET['module'].'?num=1>1</a>';
		}
		if ($page > $sidepage+2) {
			echo '...';
		}
		for ($i=$sidepage;$i>=1;$i--) {
			if ($page > 1+$i) {
				$number=$page-$i;
				echo '<a href= ./'.$_GET['module'].'?num='. $number.'>'. $number .'</a>  ';
			}
		}
		echo '<span class="paginator-page"><b>'.$page.'</b></span>';
		for ($i=1;$i<=$sidepage;$i++) {
			if ($page < $total-$i) {
				$number=$page+$i;
				echo '<a href= ./'.$_GET['module'].'?num='. $number.'>'. $number .'</a>  ';
			}
		}

		if ($page < $total - $sidepage -1) {
			echo '...';
		}
		if ($page != $total) {
			echo '<a href= ./'.$_GET['module'].'?num='. $total .'>'. $total .'</a>  ';
			$number=$page+1;
			echo '<a href= ./'.$_GET['module'].'?num='. $number.'>></a>  ';
		}
		?>
	</div>

</div>