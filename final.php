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


//$movie = mysql_query("SELECT * FROM `movies` WHERE movie_name='$movie_name';");

//$row = mysql_fetch_assoc($movie);
//$lang = $row['language'];

//$_SESSION["lang"] = $lang;

//$genre = $row['genre'];

//$_SESSION["genre"] = $genre;

//$rating = $row['rating'];

//$_SESSION["rating"] = $rating;


echo "Seats successfully booked";
echo "<br/>\n";

$seat = array();

$seat =  $_SESSION["seat"];



$price = 0;

foreach ($seat as $key => $value) {

	$price++;

	$result = mysql_query("SELECT * FROM reservations WHERE seat_no = '$key' AND theatre_name='$theatre_name' AND screen='$screen' AND movie_time='$day $time'");

if(mysql_num_rows($result) == 0) {
	
	  // echo $key;
	  // echo "<br/>\n";

	  mysql_query( "INSERT INTO `reservations` VALUES ('$theatre_name', '$screen', '$key','$day $time', '$name' , CURRENT_TIMESTAMP)") or die(mysql_error());

		//echo "<br/>\n";

	}
}