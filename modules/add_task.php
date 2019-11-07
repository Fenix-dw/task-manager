<?php
include "../conf/db.php";
include "../conf/settings.php";
if (isset($_POST["addTaskBtn"])&& $_POST["task_name"]!="") {

	$addTaskSql="INSERT INTO tasks (task_group_id, name, description) VALUES ('". $_POST["group_id"] . "' , '" . $_POST["task_name"] . "' , '" . $_POST["task_description"] .   "')";

	if(mysqli_query($conn, $addTaskSql))
	{
		include "../modules/taskList.php";

	}else{
		echo "<h2>Ошибка</h2>";
	}
}
?>