<?
// Скрипт проверки

// Соединямся с БД
require_once("db.php");
	if($connection == false) {
		echo "Ошибка!";
		echo mysqli_connect_errno();
		exit();
	}
/*
if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($connection, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
        print "Хм, что-то не получилось";
    }
    else
    {
       // print "Привет, ".$userdata['user_login'].". Всё работает!";
	    header("Location: order_system.php"); exit();
    }
}
else
{
    print "Включите куки";
}*/
?>