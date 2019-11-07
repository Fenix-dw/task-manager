<?php
include "../conf/db.php";
include "../conf/settings.php";

// if ($logged_user_id && isset($_POST["group_name"])) {
// 	if ($_POST["group_name"]!="") {
if (isset($_POST["addGroupBtn"])) {

	$addGroupdSql="INSERT INTO task_groups (name, user_id) VALUES ('" . $_POST["group_name"] . "' , '" . $logged_user_id .   "')";
	if(mysqli_query($conn, $addGroupdSql))
	{
		include "../modules/task_group_list.php";
		//echo "<h2>Группа добавлена</h2>";

	}else{
		echo "<h2>Ошибка</h2>";
	}
}
//}
?>