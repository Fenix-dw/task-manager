<?php
include "../conf/db.php";
include "../conf/settings.php";

if (isset($_GET["group"])) {
	$deleteTaskSql="DELETE  FROM task_groups WHERE id=" . $_GET["group"];
	if(mysqli_query($conn, $deleteTaskSql))
	{
		include "../modules/task_group_list.php";
		// header("Location:/");

	}else{
		echo "<h2>Ошибка</h2>";
	}
}
?>