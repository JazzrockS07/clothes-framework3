<div class="body-page">
	<div class="product-menu">
		Темы новостей
	</div>

	<?php while($row2=$res2->fetch_assoc()) { ?>
		<a href="/news/theme?theme=<?php echo hc($row2['theme']) ?>">
			<button class="news-button"><?php echo hc($row2['theme']); ?></button>
		</a>
	<?php }
	$res2->close();
	?>


	<div class="product-menu">
		Новости
	</div>


	<?php while($row=$result->fetch_assoc()) { ?>
		<br>
		<div class="news_name">
			<?php echo "<b>".hc($row['news_name'])."</b>"; ?>
		</div>
		<br>
		<div class="clearfix">
			<div class="news_datetime">
				<?php echo hc($row['datetime news']); ?>
			</div>
			<div class="news_theme">
				<?php echo hc($row['theme']); ?>
			</div>
		</div>
		<br>
		<div class="news-textarea">
			<?php echo nl2p((hc($row['text']))); ?>
		</div>
		<hr>
	<?php }
	$result->close(); ?>

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
