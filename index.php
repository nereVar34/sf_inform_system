<?php
if(isset($_POST['signIn']))
	{
       header("Location:e-journal.php"); exit();
    }   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<meta charset = "UTF-8">
	<link rel = "stylesheet" href = "CSS/authorization.css">
</head>

<body>
	<div class="wrapper">
		<header>
			ЭЛЕКТРОННЫЙ ЖУРНАЛ ОТДЕЛЕНИЯ СПО<br>
			СФ ФГБОУ ВО "ВолгГТУ"
		</header>
		<div class="content">
			<div class="authorization">
				<h2>АВТОРИЗАЦИЯ</h3>
				<form method="POST">
				<div class = "fieldsContainer">
					<div class = "fieldNames">
						Логин <br>
						Пароль
					</div>
					<div class = "fields">
						<input type="text"> <br>
						<input type="password">
					</div>
				</div>
				</form>
				<form method="POST">
				<input type="submit" name ="signIn" class="btnSignIn" value="ВХОД">
				</form>
			</div>
		</div>
		<footer>
				2022 — Author: Maxim Gureev
		</footer>
	</div>
</body>
</html>
