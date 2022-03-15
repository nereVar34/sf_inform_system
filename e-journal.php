<!DOCTYPE html>
<html>
<head>
	<title>Электронный журнал</title>
	<meta charset = "UTF-8">
	<link rel = "stylesheet" href = "CSS/e-journal.css">
</head>

<body>
	<div class="wrapper">
		<header>

		</header>
		<div class="content">
			<div class="side_panel">
				<?php
				for ($i=0; $i<5; $i++)
				echo 
				"<details>
					<summary><b>+</b>".$i."
				</details>";
				?>
			</div>
			<div class="main_panel">
				
			</div>	
		</div>
		<footer>
				2022 — Author: Maxim Gureev
		</footer>
	</div>
</body>
</html>
