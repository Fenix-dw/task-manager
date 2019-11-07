<div id="shapka">
	<div id="logo">
		<a href="/"><img src="imges/website/logo.png"></a>
		<span>
			<b>Task</b><i>Manager</i>
		</span>
	</div>

	<div id="menu">
		<?php 
		if(isset($_COOKIE["logged_user_id"])) {
			?>
				<a href="exit.php">Выйти</a> 
			<?php
			} else {
				?>
				<a href="login.php" id="open_log_out">Войти</a>
				<?php  
			}
			?>
	</div>
</div>
