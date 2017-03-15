<?php


require 'config.php';

session_start();

$name = $_SESSION["login"];
//echo $name;
//echo "<br/>\n";

$movie_name = $_SESSION["movie"];

//echo $movie_name;
//echo "<br/>\n";

$theatre_name = $_SESSION["theatre"];
 //echo $theatre_name;
 //echo "<br/>\n";

$screen = $_SESSION["screen"];
//echo $screen;
//echo "<br/>\n";

$day = $_SESSION["showdate"];

$time = $_SESSION["showtime"];


$movie = mysql_query("update reservations set payment_status = 1 where customer_name='$name' AND theatre_name='$theatre_name'  AND movie_time='$day $time' ");


?>