<?php
if (isset($_GET["group"])) {

//выбор всех заданий по групе из базы
$getAllTasksByGroupIdSql="SELECT * FROM tasks WHERE task_group_id=" . $_GET["group"];

//выполняем скрипт и получаем результат в переменную result
$result=mysqli_query($conn,$getAllTasksByGroupIdSql);

// получаем количество записей в таблице
$task_row_col=mysqli_num_rows($result);

}
?>

<?php 
$i=0;
if (isset($_GET["group"])) {
	$status="";
	while ($i<$task_row_col) {
	 	$task=mysqli_fetch_assoc($result);
	 	
	 	if ($task["isFinished"]) {
	 		$status="finished";
	 	}
	 	else{
	 		$status="started";
	 	}
	 	?>
		<li class="tab">
			<input type="checkbox" id='tab<?php echo $i ?>' name="tab-group">
			<div class="img">
				<div id="status" title="status" class='<?php echo $status?>' data-link="http://task-manager/modules/update_status.php?task_id=<?php echo $task["id"];?>&group=<?php echo $_GET["group"];?>&status=<?php echo $task["isFinished"];?> " onclick="updateStatusTask(this,<?php echo $task["isFinished"];?>)"></div>
			</div>
    		<label for='tab<?php echo $i ?>' class="tab-title"><?php echo $task["name"];?></label>
    		<div class="close" title="delete" data-link="http://task-manager/modules/delete_task.php?task_id=<?php echo $task["id"];?>&group=<?php echo $_GET["group"];?> " onclick="deleteTask(this)">Х</div>	 
		    <section class="tab-content"> 
		    	<div>	
		    		<?php echo $task["description"]; ?>
		    	</div>
		    </section>
		</li>
<?php
	$i=$i+1;
	}
}
?>

