<div class="body-page">
	<div class="filemanager">FILE MANAGER</div><br>
	<br>


	<?php
	foreach ($dir as $v) {
		if (is_dir ($sub."/".$v))	{
			echo '<img src="/img/folder.jpg" class="programpicture">
			<a href="/index.php?module=program&link='.$sub.'/'.$v.'">'.$v.'</a><br>';
		} else {
			echo '<img src="/img/filephp.png" class="programpicture">'.$v.'<br>';
		}
	}
	?>
</div>