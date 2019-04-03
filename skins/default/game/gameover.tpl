<div class="body-page">

	<div class="game-over">
		<?php
		if ($_GET['action'] == 'win') {
			echo 'БЭТМЕН СНОВА ОСТАНОВИЛ ДЖОКЕРА <br>';
			echo '<img src="/img/joker-lose.jpg" class="game-over-img">';
		} else {
			echo 'ЭТУ БИТВУ ВЫИГРАЛ ДЖОКЕР <br>';
			echo '<img src="/img/jocker-win.jpg" class="game-over-img">';
		}
		?>
	</div>
</div>