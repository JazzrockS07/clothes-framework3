<div class="body-page">
	<div class="reg">Регистрация на сайте</div><br>

	<?php if(!isset($_SESSION['regok'])) { ?>

	<form action="" method="post" class="reg-form">
		<table class="reg-table">
			<tr>
				<td>Логин *</td>
				<td><input type="text" name="login" value="<?php if(isset($_POST['login'])) echo hc($_POST['login']); ?>"></td>
				<td><?php if(isset($errors['login'])) echo $errors['login']; ?></td>
			</tr>
			<tr>
				<td>Пароль *</td>
				<td><input type="password" name="password" value="<?php if(isset($_POST['password'])) echo hc($_POST['password']); ?>"></td>
				<td><?php if(isset($errors['password'])) echo $errors['password']; ?></td>
			</tr>
			<tr>
				<td>Email *</td>
				<td><input type="text" name="email" value="<?php if(isset($_POST['email'])) echo hc($_POST['email']); ?>"></td>
				<td><?php if(isset($errors['email'])) echo $errors['email']; ?></td>
			</tr>
			<tr>
				<td>Возраст</td>
				<td><input type="text" name="age" value="<?php if(isset($_POST['age'])) echo hc($_POST['age']); ?>"></td>
				<td></td>
			</tr>
		</table>
		<p>* поля, обязательные для заполнения</p><br>
			<input type="submit" name="sendreg" value="Зарегистрироваться">
	</form>
	</div>

	<?php } else { unset($_SESSION['regok']); ?>
	<div class="reg-text">Письмо с инструкцией по активации Вашего аккаунта выслано на Ваш email</div>
	<?php } ?>

</div>