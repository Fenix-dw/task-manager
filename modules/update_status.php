<?php
include "../conf/db.php";
include "../conf/settings.php";
if (isset($_GET["task_id"])) {
//var_dump($_GET["status"]);
	$status=0;
	// var_dump($status);
	if ($_GET["status"]!="1") {
		$status=1;
	}
	// var_dump($status);
	$updateStatusTaskSql="UPDATE tasks SET isFinished=" . $status . " WHERE task_group_id=". $_GET["group"] . " AND id=". $_GET["task_id"] ;

//var_dump($updateStatusTaskSql);
	// die();
	if(mysqli_query($conn, $updateStatusTaskSql))
	{
		include "../modules/taskList.php";

	}else{
		echo "<h2>Ошибка</h2>";
	}
}
?>