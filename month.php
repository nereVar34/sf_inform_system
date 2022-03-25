<?php
$months = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
$numb_of_month = array_search($_POST['name'], $months);
               if ($_POST['check'] == 1)
                    if ($numb_of_month!=0)
                        $numb_of_month--;
                    else
                        $numb_of_month=11;
                else
                if ($_POST['check'] == 0)
                    if ($numb_of_month!=11)
                        $numb_of_month++;
                    else
                        $numb_of_month=0;
	print_r($months[$numb_of_month]);
?>