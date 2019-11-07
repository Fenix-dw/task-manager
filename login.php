<?php
include "conf/db.php";

if (
	isset($_POST["email"]) && isset($_POST["password"]) &&
	$_POST["email"]!="" && $_POST["password"]!=""
) 
{
	$loginSql="SELECT * FROM users WHERE email LIKE '" . $_POST["email"] . 
	"' AND password LIKE '" .  $_POST["password"] . "'";
	$result=mysqli_query($conn, $loginSql);

	$row_col=mysqli_num_rows($result);

	if ($row_col==1) {
		$user=mysqli_fetch_assoc($result);
		//создаем куки для хранения данных пользователя
		setcookie("logged_user_id", $user["id"], time() + 1000);		
		setcookie("logged_user_name", $user["name"], time() + 1000);
		setcookie("logged_user_photo", $user["photo"], time() + 1000);
		header("location: /");

	}else{
		?>	
			<h1 class="eror">Логин или пароль введены не верно</h1>
		<?php 
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
		include "parts_site/shapka.php";
	?>
	<div class="modal" id="log-out-modal" style="display: block;">
		<h2>Авторизация</h2>
		<a href="registration.php" id="open_registration">Регистрация</a>
		<form action="login.php" method="POST">
			<p>
				Введите свой email:<br/>
				<input type="text" name="email"><br/>
			</p>

			<p>
				Введите свой пароль:<br/>
				<input type="password" name="password">
			</p>
			<p>
				<button type="submit">Войти</button>
			</p>
		</form>
	</div>

</body>
</html>