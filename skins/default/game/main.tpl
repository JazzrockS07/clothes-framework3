<div class="body-page">

	<div class="game-header">
		<span class="game-name">ИГРА: "БИТВА ГЕРОЕВ"</span><br>
		Останови Джокера. Он снова угрожает Готему и его жителям. Вся надежда только на тебя. Ведь только ты, только Бетмен может его остановить. Угадай - куда нанести удар Джокеру. Нажми 1 - если хочешь нанести удар в голову, 2 - в живот, 3 - в ноги. Джокер попытается отбить твой удар. Если твой удар пройдет - ты нанесешь урон Джокеру на силу удара (сила удара рассчитается компьютером произвольно), если же Джокер поставит успешно блок удару, то урон будет нанесен Бетмену. Удачи, Герой!
	</div>

	<div class="clearfix">
		<div class="batman">
			<span class="life-text">Уровень жизни:</span>
			<span class="life"><?php echo '<pre>'.print_r($_SESSION['client'],1).'</pre>' ?></span>
			<img src="/img/batman.png" class="batman-img">
		</div>
		<div class="game-run">
			<div class="fight-text">Направление удара:<br>
				1 - голова<br>
				2 - живот<br>
				3 - ноги<br>
				Введите сответствующую цифру и нажмите "Удар"
			</div>
				<br>
			<form action="" method="post">
				<input type="text" name="vargame">
				<input type="submit" name="submit" value="Удар!">
			</form>
			<div class="fight">
				<br>
				<?php
				if (isset($_POST['vargame'])) {
					if ($_POST['vargame'] >= 1 && $_POST['vargame'] <= 3) {
						if($_POST['vargame'] == $random) {
							echo 'Джокер поставил блок<br>';
							echo 'и нанес Бэтмену урон на '.$rand.'x';
						} else {
							echo 'Бэтмен нанес успешный удар<br>';
							echo 'и нанес Джокеру урон на '.$rand.'x';
						}
					}
				}
				?>
			</div>
		</div>
		<div class="jocker">
			<span class="life-text">Уровень жизни:</span>
			<span class="life"><?php echo '<pre>'.print_r($_SESSION['server'],1).'</pre>' ?></span>
			<img src="/img/jocker.jpg" class="jocker-img">
		</div>
	</div>

</div>

