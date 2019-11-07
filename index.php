<?php 
//подключаем файл конфигурации базы данных
include "conf/db.php";
include "conf/settings.php";

if ($logged_user_id==null) {
	header("Location: /login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task-manager</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 
	include "parts_site/shapka.php";
	 ?>
	<div id="content">
		
		<div id="list">

			<div id="user">
				<div class="img-user">
					<img src="<?php echo $logged_user_photo ?>">
				</div>
				<h2><?php echo $logged_user_name ?></h2>	
							
			</div>

			<div id="spisok">
				<ul id="task-group-list-ul">
					<?php 
					include "modules/task_group_list.php";
					?>
				</ul>
			</div>	
			<div id="add-list">
				<a href="#" id="open_add_list">
					<div class="img-list">
						<img src="imges/group/plus.png">
					</div>
					<h2>Добавить группу</h2>
				</a>
			</div>		
		</div>

		<div id="task">
			<?php
			if (isset($_GET["group"])) 
			{
			?>
			<div id="img-task">
				<img src="imges/task/fon.jpg">
				<h2><?php echo $_GET["group_name"]; ?>
				</h2>
				
			</div>
			
			<div id="task-list">
				<input type="hidden" name="group_id" value='<?php echo $_GET["group"]; ?>'>
				<!-- <div class="accordion"> -->
					<!-- <?php
					include "modules/taskList.php";
					?> -->
				<!-- </div> -->
				<ul id="task-list-ul" class="accordion">
					<?php
					include "modules/taskList.php";
					?>
				</ul>
			</div>
			<div id="add-task">	
				<a href="#" id="open_add_task">
					<div class="img">
						<img src="imges/group/plus.png">
					</div>
					<h2>Добавить задание</h2>
				</a>
			</div>			
			<?php
			}	
			?>			
		</div>
	</div>
	<?php
	include "modules/addList.php";
	include "modules/addTaskModal.php";
	?>
		<script type="text/javascript" src="js/script.js"></script>
</body>
</html>