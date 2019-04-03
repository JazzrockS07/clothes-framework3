<div class="body-page">
	<div class="user">
		Личный кабинет
	</div>

	<?php if (isset($_SESSION['user'])) { ?>

		<form action="" method="post" enctype="multipart/form-data">
			<div>
				<span class="user-text">Логин: </span>
				<input type="text" name="login" value="<?php if (isset($row['login'])) echo hc($row['login']); ?>" size="40" maxlength="40">
			</div>
			<div>
				<span class="user-text">e-mail: </span>
				<input type="text" name="email" value="<?php if (isset($row['email'])) echo hc($row['email']); ?>" size="40" maxlength="40">
			</div>
			<div>
				<span class="user-text">Возраст: </span>
				<input type="text" name="age" value="<?php if (isset($row['age'])) echo hc($row['age']); ?>" size="40" maxlength="40">
			</div>
			<div>
				<span class="user-text">Аватар: </span>
				<?php if (!empty($filename)) {
					echo '<img src="/uploaded/100x100/'.$filename.'">';
				} elseif (isset($row['img'])) {
					echo '<img src="/uploaded/100x100/'.hc($row['img']).'">';
				} ?>
			</div>
			<input type="file" name="file" accept="image/jpeg,image/png,image/gif,image/jpg">
			<input type="submit" name="submit" value="загрузить файл аватара">
			<h2><?php if (isset($error['img'])) echo $error['img']; ?></h2>
			<h2><?php if (isset($rezult)) echo $rezult; ?></h2>
			<input type="submit" name="ok" value="Редактировать данные">
		</form>
		<h2><?php if (isset($error1)) echo $error1; ?></h2>
		<?php if (isset($info)) { ?>
			<div class="user-change">
				<h2><?php echo $info; ?> </h2>
			</div>
		<?php } ?>

	<?php } else {
		echo '<br><b>Для входа в личный кабинет Вам необходимо авторизоваться!</b>';
	} ?>

</div>