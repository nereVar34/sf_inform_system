<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	require_once("db.php");
	if($connection == false) {
		echo "Ошибка!";
		echo mysqli_connect_errno();
		exit();
	}
	/*if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
	 {
	 }
	else 
	 {
		header("Location: index.php"); exit;
	 }
	if(isset($_POST['logOutBtn']))
				{
					header("Location: logout.php"); exit;
				}*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Электронный журнал</title>
	<meta charset = "UTF-8">
	<link rel = "stylesheet" href = "CSS/e-journal.css">
	<link rel = "stylesheet" href = "scripts/script.js">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready (function() {
			//Кнопка предыдущий месяц
			var month_name = document.getElementById("month").innerHTML;
			$("#back").bind("click", function(){
				$.ajax ({
					url: "month.php",
					type: "POST",
					data: ({name: month_name, check: 1}),
					dataType: "html",
					success: function (data) {
						$("#month").text (data);
						month_name = document.getElementById("month").innerHTML;
					}
				});
				$.ajax ({
					url: "days.php",
					type: "POST",
					data: ({name: month_name, check: 1}),
					dataType: "html",
					success: function (data) {
						$("#days").html (data);
					}
				});
				$.ajax ({
					url: "grades.php",
					type: "POST",
					data: ({name: month_name}),
					dataType: "html",
					success: function (data) {
						$("#grades").html (data);
					}
				});
			});
			
			//Кнопка следующий месяц
			$("#next").bind("click", function(){
				$.ajax ({
					url: "month.php",
					type: "POST",
					data: ({name: month_name, check: 0}),
					dataType: "html",
					success: function (data) {
						$("#month").html (data);
						month_name = document.getElementById("month").innerHTML;
					}
				});
				$.ajax ({
					url: "days.php",
					type: "POST",
					data: ({name: month_name, check: 0}),
					dataType: "html",
					success: function (data) {
						$("#days").html (data);
					}
				});
				$.ajax ({
					url: "grades.php",
					type: "POST",
					data: ({name: month_name}),
					dataType: "html",
					success: function (data) {
						$("#grades").html (data);
					}
				});
			});

			$("input[name='discip']").bind("click", function(){
				var value = $('input[name="discip"]:checked').val();
				$.ajax ({					
					url: "students.php",
					type: "POST",
					data: ({name: value}),
					dataType: "html",
					success: function (data) {
						$("#students_list").html (data);
					}
				});
				//var value = $('input[name="student"]:checked').val();
				$.ajax ({
					url: "grades.php",
					type: "POST",
					data: ({name: month_name}),
					dataType: "html",
					success: function (data) {
						$("#grades").html (data);
					}
				});
			});
			
		
		});
	</script>
</head>

<body>
	<div class="wrapper">
		<header>
			<div class="left_header">
				<a href="index.php" title="Добавить группу"><img class="addGroup" src="images/add-students-group.png" alt="Add Group Icon" width=50 height=50></a>
			</div>
			<div class="right_header">
				<a href="index.php" title="Архив"><img class="archive" src="images/archive.png" alt="Archive Icon" width=50 height=50></a>
				<a href="index.php" title="Личный кабинет"><img class="profile" src="images/male-profile.png" alt="Profile Icon" width=50 height=50></a>
				<a href="index.php" title="Выйти из учётной записи"><img class="logouticon" src="images/logout.png" alt="LogOut Icon" width=50 height=50></a>
			</div>
		</header>
		<div class="content">
			
			<div class="side_panel">
				<form method="POST">		
				<?php
				$count=0;
				$result = mysqli_query($connection, "SELECT DISTINCT name FROM disciplines");	
				while ($row = mysqli_fetch_array($result)) {
					$result2 = mysqli_query($connection, "SELECT groups.name, disciplines.name FROM `groups`, `disciplines` WHERE groups.id_group=disciplines.id_group AND disciplines.name='".htmlentities($row["name"])."'");
					echo 
					"<details>
						<summary>".htmlentities($row["name"])."</summary><div>";
							
						while ($row2 = mysqli_fetch_array($result2)){
							
							echo "<input type='radio' name='discip' id='group".$count."' value=".htmlentities($row2[0])."><label for='group".$count."'>".htmlentities($row2[0])."</label><br>";
							$count++;
							}
					
					echo "</div></details>";
					$count++;
				}
				mysqli_free_result($result);
				mysqli_free_result($result2);
			    mysqli_close($connection);
				?>
				</form>
			</div>
			
			<div  class="main_panel">
				<div class="empty_now">empty</div>
				<div class="month_selector">
						<form method="POST">
							<?php
							$months = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
							$numb_of_month = getdate();
							$numb_of_month = $numb_of_month[mon]-1;
							
							echo "<input type='button' id='back' name='back' value='🡄'><span id='month'>";
							print_r($months[$numb_of_month]);
							echo "</span><input type='button' id='next' name='next' value='🡆'>";
							?>
							<input type='hidden' id='' value=''
						</form>
				</div>
				<div  class="students_list">
					<div id="students_list">
						
					</div>
				</div>
				<div class="grade_editor">
					<div class="days">
							<table><tr id="days">
							<?php
								$month = $numb_of_month+1;
								$year = $date[year];
								for ($i=1; $i <= date('t', mktime(0, 0, 0, $month, 1, $year));$i++){
										echo "<td>".$i."</td>";
								}
							?>
							</tr></table>
					</div>
					<div id="grades" class="grades">
					
					</div>
					<div class="bottom">
						
					</div>
				</div>
			</div>	
		</div>
		
		<footer>
				2022 — Author: Maxim Gureev
		</footer>
	</div>
	<script src="scripts/script.js"></script>
</body>
</html>
