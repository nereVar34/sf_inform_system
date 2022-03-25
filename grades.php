<?php
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   require_once("db.php");
	if($connection == false) {
		echo "Ошибка!";
		echo mysqli_connect_errno();
		exit();
	}
    
    
    $months = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
    $numb_of_month = array_search($_POST['name'], $months)+1;
    $date = getdate();
    $month = $numb_of_month;
	$year = $date[year];
    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
    $query1 = mysqli_query($connection, "SELECT DAY(date) AS day, date, mark FROM `student_marks` WHERE MONTH(date)=".$month);
    echo "<table><tr>";
    $j=1;
    while ($row = mysqli_fetch_array($query1)) {
        for ($i=$j; $i<=$days_in_month; $i++) {
            if  (htmlentities($row["day"])==$i) {
                echo "<td>".htmlentities($row["mark"])."</td>";
                $j=$i+1;
                break;
            }
        else
         echo "<td> </td>";
         
        }
    }
    for ($j; $j<=$days_in_month; $j++)
        echo "<td> </td>";
    echo "</tr></table>";
?>