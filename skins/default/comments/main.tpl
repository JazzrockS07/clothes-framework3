<div class="body-page">

	<?php
		while ($row = mysqli_fetch_assoc($res)) {
			echo '<br> - <b>'.htmlspecialchars($row['name']).'</b> '.htmlspecialchars($row['datetime_create']).'<br>';
			echo '	'.nl2br(htmlspecialchars($row['text'])).'<br>';
		}
	?>
	<br>
	<div id="newcomment"></div>
	<br>

	<div id="err3"></div>
	<?php if (isset($_SESSION['user'])) { ?>

	<div class="form-comments">
		Напишите свой комментарий:
		<form method="post">
			<table>
				<tr>
					<td width="55">Имя</td>
					<td><input type="text" name="name" id="comment_name" maxlength="32"></td>
					<td><?php if(isset($errors['name'])) echo $errors['name']; ?> </td>
				</tr>
				<tr>
					<td colspan="2">Введите комментарий:<br>
						<textarea rows="5" cols="55" wrap="hard" name="text" id="comment_text"></textarea>
					</td>
					<td><?php if(isset($errors['text'])) echo $errors['text']; ?></td>
				</tr>
			</table>
			<input type="button" name="sendcomments" onclick="addComment()" value="Отправить комментарий">
		</form>
	</div>

	<?php } else echo '<br><b>Для комментрования Вам необходимо авторизоваться!</b>' ?>


</div>
