<?php

require 'config.php';

session_start();

$name = $_SESSION["login"];
echo $name;
echo "<br/>\n";

$movie_name = $_SESSION["movie"];

echo $movie_name;
echo "<br/>\n";

$theatre_name = $_SESSION["theatre"];
 echo $theatre_name;
 echo "<br/>\n";

$screen = $_SESSION["screen"];
echo $screen;
echo "<br/>\n";

echo "Seats successfully booked";
echo "<br/>\n";

$seat = array();
$seat = $_POST;


//print_r($_POST);


//echo sizeof($seat);

/*
for($new = 1; $new <= sizeof($seat); $new++)
{
	$new_seat = $seat[$new];
	echo $seat[$new];
	echo $new_seat;

	/*INSERT INTO `reservations` (`theatre_name`, `screen`, `seat_no`, `customer_name`, `booking_time`) VALUES ('A', 'A', '5', '456', CURRENT_TIMESTAMP);

	echo "<br/>\n";
}*/

$price = 0;

foreach ($seat as $key => $value) {

	$price++;

	$result = mysql_query("SELECT * FROM reservations WHERE seat_no = '$key' AND theatre_name='$theatre_name' AND screen='$screen'");

if(mysql_num_rows($result) == 0) {
	
	  // echo $key;
	  // echo "<br/>\n";

	  mysql_query( "INSERT INTO `reservations` VALUES ('$theatre_name', '$screen', '$key', CURRENT_TIMESTAMP, '$name' , CURRENT_TIMESTAMP)") or die(mysql_error());

		//echo "<br/>\n";

	}
}


$rate = mysql_query("SELECT * FROM `screening` WHERE movie_name='$movie_name' AND theatre_name= '$theatre_name' AND screen='$screen';");

$row = mysql_fetch_assoc($rate);
$rate = $row['rate'];

echo "Number of seats = " . $price;
 
echo "<br>\n Ticket Rate : " . $rate;

$price = $price * $rate;

echo "<br>\n Total Price : ".$price;

?>


