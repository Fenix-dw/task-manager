<div class="modal" id="addTask-modal" >
	<div class="close">X</div>
	<h2>Добаление задание<h2>
	<form id="add_task_form" method="POST" action="http://task-manager/modules/add_task.php?group=<?php echo $_GET["group"];?>" >
		<input  type="hidden" name="group_id" value='<?php echo $_GET["group"];?>'<br/>
		<p>
			Введите название задания:<br/>
			<input type="text" name="task_name"><br/>
		</p>
		<p>
			Введите описание задания:<br/>
			<textarea type="text" name="task_description"></textarea><br/>
		</p>
		<p>
			<button name="addTaskBtn" type="submit">Добавить</button>
		</p>
	</form>
</div>
