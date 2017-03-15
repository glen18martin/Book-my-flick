<?php


require 'config.php';


if(isset($_GET['deleteuser'])) {

	mysql_query("DELETE FROM users where U_name = '" . $_GET['deleteuser'] ."'");
die;
}

if(isset($_GET['deletedate'])) {
	//$d = explode("-", $_GET['deletedate']);
$ddd = $_GET['deletedate'];
	//print_r($d);

	//$ddd = $d[2] . '-' . $d[1] . '-' . $d[0];
	mysql_query("DELETE FROM reservations where movie_time < '" . $ddd ." 23:59:59'");

	//echo "DELETE FROM reservations where movie_time < '" . $ddd ." 23:59:59'";

die;
}

$time = $_POST['ctime'];
$seat = $_POST['cseat'];
mysql_query("DELETE FROM `reservations` WHERE `booking_time` = '$time' AND `seat_no` = '$seat'");

?>