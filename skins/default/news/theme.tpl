<div class="body-page">
	<div class="product-menu">
		Новости по теме: <?php echo $_GET['theme']; ?>
	</div>
	<?php while($row=$res->fetch_assoc()) { ?>
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
	$res->close(); ?>
</div>