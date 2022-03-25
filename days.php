<?php
    $months = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
    $numb_of_month = array_search($_POST['name'], $months)+1;
    $date = getdate();
    if ($_POST['check'] == 1)
                    if ($numb_of_month!=1)
                        $numb_of_month--;
                    else
                        $numb_of_month=12;
                else
                if ($_POST['check'] == 0)
                    if ($numb_of_month!=12)
                        $numb_of_month++;
                    else
                        $numb_of_month=1;
    $month = $numb_of_month;
	$year = $date[year];
    for ($i=1; $i <= date('t', mktime(0, 0, 0, $month, 1, $year));$i++){
            echo "<td>".$i."</td>";
    }
?>