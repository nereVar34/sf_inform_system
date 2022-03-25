<?php
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   require_once("db.php");
	if($connection == false) {
		echo "Ошибка!";
		echo mysqli_connect_errno();
		exit();
	}
    $count=0;
    $check = $_POST['name'];
    echo "<form method='POST'>";
    $query1 = mysqli_query($connection, "SELECT id_group FROM `groups` WHERE name='".$check."'");
    while ($row = mysqli_fetch_array($query1)) {
        $query2 = mysqli_query($connection, "SELECT short_name FROM `students` WHERE id_group=".htmlentities($row["id_group"]));
        while ($row2 = mysqli_fetch_array($query2)){
            $student_name = htmlentities($row2["short_name"]);
            echo "<input type='radio' name='student' id='student".$count."' value='".$student_name."'><label for='student".$count."'>".$student_name."</label><br>";
            $count++;
        }
    }
    echo "</form>";
    
?>