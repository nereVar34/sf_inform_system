<?php
$months = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
$numb_of_month = array_search($_POST['name'], $months);
//echo $numb_of_month;
               /* if(isset($_POST['back'])) {
					$numb_of_month--;
					
				} else if(isset($_POST['next'])) {
					$numb_of_month++;
				}*/
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
                //echo $numb_of_month;
				print_r($months[$numb_of_month]);
?>