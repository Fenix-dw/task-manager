<?php
include "../conf/db.php";
include "../conf/settings.php";

if (isset($_GET["task_id"])) {
	$deleteTaskSql="DELETE  FROM tasks WHERE id=" . $_GET["task_id"];
	if(mysqli_query($conn, $deleteTaskSql))
	{
		include "../modules/taskList.php";
		// header("Location:/");

	}else{
		echo "<h2>Ошибка</h2>";
	}
}
?>