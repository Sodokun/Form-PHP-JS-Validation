
<?php
 
//var SQL
$hostname="localhost";
$username="root";
$password="";
$db_name="sql_test";

//link SQL
$link = mysqli_connect($hostname, $username, $password, $db_name);

//Conteo de usuarios registrados
$count_all = "SELECT COUNT(*) FROM `form`";
$count_db = mysqli_query($link, $count_all);
$user_reg = mysqli_fetch_assoc($count_db);


?>
