
<div class="body-page">
	<div class="calc">Калькулятор</div><br>
	<div class="clearfix">
		<div class="calc-form">
		<form action="" method="post">
			<div>
				Введите 1-е число <input type="text" name="number1">
			</div>
			<br>
			<div>
				Введите 2-е число <input type="text" name="number2">
			</div>
			<br>
			<div>
				Выберите действие<br>
				<label>плюс<input type="radio" name="action" value="+"></label>
				<label>&#160минус<input type="radio" name="action" value="-"></label>
				<label>&#160умножить<input type="radio" name="action" value="*"></label>
				<label>&#160разделить<input type="radio" name="action" value=":"></label>
			</div>
			<br>
			<div>
				<input type="submit" name="submit" value="выполнить действие">
			</div>
		</form>
		</div>
		<div class="calc-rez">
			Решение:<br>
			<?php
				if (isset($_POST['number1'],$_POST['number2'])) {
					echo (int)$_POST['number1'];
					if (isset($_POST['action'])) {
						echo $_POST['action'];
						} else {
							echo "+";
						}
					echo (int)$_POST['number2'].' = '.$rezult;
				}
			?>
		</div>
	</div>
</div>