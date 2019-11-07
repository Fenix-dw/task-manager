<?php
if ($logged_user_id) {
//выбор всех групп из базы
$getAllGroupSql="SELECT * FROM task_groups WHERE user_id=" . $logged_user_id;

//выполняем скрипт и получаем результат в переменную result
$result=mysqli_query($conn,$getAllGroupSql);

// получаем количество записей в таблице
$col_row=mysqli_num_rows($result);
}else{
	header("Location: /");
}

?>

<?php 
$i=0;
while ($i<$col_row) {
 	$group=mysqli_fetch_assoc($result);
 	?>
	<li>
		<a href='/index.php?group=<?php echo $group["id"]; ?>&group_name=<?php echo $group["name"]; ?>'>
			<div class="img-list">
				<img src="imges/group/spisok.png">
			</div>
			<h2><?php echo $group["name"];?></h2>
			
		</a>
		<div class="close" title="delete" data-link="http://task-manager/modules/delete_group.php?group=<?php echo $group["id"];?>" onclick="deleteGroup(this)">Х</div>	
	</li>
<?php
	$i=$i+1;
}
?>