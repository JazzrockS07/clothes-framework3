<div class="body-page">
	<div class="clearfix">
		<div class="users-menu">
			<div class="filter">
				<a href="/admin/users&filter=yes">Фильтр</a>
				<?php if (isset($_GET['filter'])) { ?>
					Введите часть логина:
					<form action="" method="post">
						<input type="text" name="search" size="10" maxlength="10">
				   		<input type="submit" name="go" value="Поиск">
					</form>
				<?php } ?>
				<?php if (isset ($_POST['go'],$_POST['search'])) {
					if (!mysqli_num_rows($search)){
						echo '<br><b>Пользователя с такими буквами не найдено</b><br>';
					} else {
						echo '<br><b>Перечень найденных пользователей:</b><br>';
						while($rowsearch = mysqli_fetch_assoc($search)) { ?>
							<div class="users-list">
								<a href="/admin/users&id=<?php echo (int)$rowsearch['id']; ?>"><?php echo hc($rowsearch['login']); ?></a>
							</div>
						<?php }
					}
				} ?>
			</div>
			<br>
			<?php if (!isset ($_POST['go'],$_POST['search'])) {
				echo '<b>Перечень всех пользователей:</b><br>';
				while($rows = mysqli_fetch_assoc($users)) { ?>
					<div class="users-list">
						<a href="/admin/users&id=<?php echo (int)$rows['id']; ?>"><?php echo hc($rows['login']); ?></a>
					</div>
				<?php }
			} ?>
		</div>
		<div class="users-update">
			<form action="" method="post">
				<div class="product-add">
					Меню редактирования данных пользователя
				</div>
				<div>
					<span class="product-text">Логин: </span>
					<input type="text" name="login" value="<?php if (isset($row['login'])) echo hc($row['login']); ?>" size="40" maxlength="40">
				</div>
				<div>
					<span class="product-text">Пароль: </span>
					<input type="password" name="password" value="<?php if (isset($row['password'])) echo hc($row['password']); ?>" size="40" maxlength="40">
				</div>
				<div>
					<span class="product-text">Доступ: </span>
					<label>открыт <input type="radio" name="access" value="0" <?php if (isset($row['access'])) { if ($row['access'] == 0) echo 'checked'; } ?>></label>
					<label>забанить <input type="radio" name="access" value="2" <?php if (isset($row['access'])) { if ($row['access'] == 2) echo 'checked'; } ?>></label>
					<label>админ <input type="radio" name="access" value="5" <?php if (isset($row['access'])) { if ($row['access'] == 5) echo 'checked'; } ?>></label>
				</div>
				<div>
					<span class="product-text">e-mail: </span>
					<input type="text" name="email" value="<?php if (isset($row['email'])) echo hc($row['email']); ?>" size="40" maxlength="40">
				</div>
				<div>
					<span class="product-text">Дата создания: </span>
					<?php if (isset($row['data create'])) echo hc($row['data create']); ?>
				</div>
				<div>
					<span class="product-text">IP address: </span>
					<?php if (isset($row['ip_address'])) echo hc($row['ip_address']); ?>
				</div>
				<div class="product-text-note"><?php if (isset($error)) echo '<h2>'.$error.'</h2>'; ?></div>
				<input type="submit" name="ok" value="Редактировать данные пользователя" class="menu-button2">
				<input type="submit" name="delete" value="Удалить данного пользователя" class="menu-button2">
			</form>
			<?php if (isset($info)) { ?>
			<div class="users-change">
				<h2><?php echo $info; ?> </h2>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

