<?php
include "conf/db.php";
if (
	isset($_POST["email"]) && isset($_POST["password"]) &&
	$_POST["email"]!="" && $_POST["password"]!=""
) 
{	
	$img_puth="";
	if ($_POST["img_Name"]!="") {
		$img_puth="imges/user/" . $_POST["img_Name"];
	}	else {
		$img_puth="imges/user/" . $_POST["photo"];
	}
	//добавление новго пользователя
	$insertSql="INSERT INTO users (email, password, name, photo) VALUES ('" . $_POST["email"] . "','" .  $_POST["password"] . "','" .  $_POST["name"] . "','" .  $img_puth . "')";
	if (mysqli_query($conn, $insertSql)) {
		?>	
			<h2 class="add">Пользователь добавлен</h2>

		<?php 		
		
	}else{
		?>	
			<h2 class="eror">Произошла ошибка!!!</h2>

		<?php
	}
}	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<?php 
		include "parts_site/shapka.php";
	?>		
	
	<div class ="modal" id="registration-modal" style="display: block;">
		<a href="login.php" id="open_login">Авторизация</a>	
		<h2>Регистрация</h2><br/>
		<form action="registration.php" method="POST">
			<p>
				Введите свое имя:<br/>
				<input type="text" name="name">
			</p>
			<p>
				Введите свой email:<br/>
				<input type="text" name="email">
			</p>
			<p>
				Введите свой пароль:<br/>
				<input type="password" name="password">
			</p><br/>	
			
		
		<div id="next" onclick="getElementById('registration-modal').style.display='none';
					 	 getElementById('registration-avatar-modal').style.display='block';"
					 	 > <h3>Далее</h3> </div>		
	</div>	
	
	<div class ="modal" id="registration-avatar-modal" >
		<h1>Виберить аватарку</h1><br/>
				
		<button type="submit" class="avatar" onclick="<?php echo '<input type="hidden" name="photo" value="boy.png">'?>
			<div></div>
			<img src="imges/user/boy.png">
		</button>
							
		
		<button type="submit" class="avatar" onclick="<?php echo '<input type="hidden" name="photo" value="girl.png">' ?>
			<div></div>
			<img src="imges/user/girl.png">
			
		</button>

		<button type="submit" class="avatar" onclick="<?php echo '<input type="hidden" name="photo" value="man-1.png">' ?>
			<div></div>
			<img src="imges/user/man-1.png">
			
		</button>

		<button type="submit" class="avatar" onclick="<?php echo '<input type="hidden" name="photo" value="man-2.png">' ?>
			<div></div>
			<img src="imges/user/man-2.png">
			
		</button>

		<button type="submit" class="avatar" onclick="<?php echo '<input type="hidden" name="photo" value="man.png">' ?>
			<div></div>
			<img src="imges/user/man.png">
		</button>

		<div id="next" class="avatar" onclick="getElementById('registration-avatar-modal').style.display='none';
				 	 						   getElementById('registration-download-avatar-modal').style.display='block';" > 		
			<h2>+</h2>
			<p>Add</p>
		</div>	
	</div>	
	
	<div class ="modal" id="registration-download-avatar-modal" >
		<h1>Загрузка изображения</h1><br/>	
			<div class="input-file-row-1">
		        <div class="upload-file-container">
		            <img id="image" src="imges/registration/upFileBg.png" alt="" />          
		            <div class="upload-file-container-text">
		                <span>Добавить</br> фото</span>
		                <input type="hidden" name="img_Name" id="imgName" value="">
		                <input type="file" name="pic[]" class="photo" id="_file" />
		            </div>
		        </div>  
		        <input type='button' id='_submit' value='Загрузить' name=submitBtn>  
		        <div class='progress_outer'>
		            <div id='_progress' class='progress'>
		                <p id="uploadMsg">Файл загружен</p>
		            </div>
		        </div>         
		    </div>          		
			<p>
				<div id="back" onclick="getElementById('registration-download-avatar-modal').style.display='none';
									 	 getElementById('registration-avatar-modal').style.display='block';"
									 	 > <h3>Назад</h3> </div>				
				<button type="submit">Зарегестрироваться</button>
			</p>			
		</form>
	</div>
<script type="text/javascript" src="js/registration.js" ></script>
</body>
</html>