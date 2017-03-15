
<?php

					require 'config.php';
					session_start();


					$name = $_SESSION["login"];
					$checklog = $_SESSION["checklog"];
					//echo $checklog;
					if ($checklog == 'off') {
					  header("Location:signinup.html");
					}



					$theatre_name = $_GET['theatre'];
			
					$_SESSION["theatre"] = "$theatre_name";

					$show_time = $_GET['time'];

					//echo $show_time;
			
					$_SESSION["showtime"] = "$show_time";

					$show_date = $_GET['day'];

					//echo $show_date;
			
					$_SESSION["showdate"] = "$show_date";
					?>



<!DOCTYPE html>
<html lang="en">
  <head>

    <script src = 'js/jquery-2.1.4.min.js'></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book my Flick!</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/tease.css">
     <link rel="icon" href="img/bmflogo.ico">
    <style>
    

    .cbr 
    {
    	background: url('img/seat.png') no-repeat;
    	background-size: contain;
    	display: inline-block;
    	width: 40px;
    	height: 50px;

    }

    .cbr:hover
    {
    	background: url('img/seat_free.png') no-repeat;
    	background-size: contain;
    	display: inline-block;
    	width: 40px;
    	height: 50px;

    }

 	.booked
    {
    	background: url('img/seat_off.png') no-repeat;
    	background-size: contain;
    	display: inline-block;
    	width: 40px;
    	height: 50px;

    }

    	.new
    {
    	background: url('img/seat_purp.png') no-repeat;
background-size: contain;
    	display: inline-block;
    	width: 40px;
    	height: 50px;

    }


    .cbr input
    {
    	left: 20;
    	top: 20;
    	position: absolute;
    }
    form{ 
    display: block;
    width: 700px;
    margin: auto; }




   </style>

    <script>
    jQuery(document).ready(function() {

    		jQuery("input[type='checkbox']").on('click', function() {
		    	
		    	
		    	if($(this).is(':checked')) $(this).parent().addClass('new');
		    	else  $(this).parent().removeClass('new');

			});

    		/*
    		for(var sheat = 39; sheat < 47; sheat++) {
				jQuery("input[data-seatno='" + sheat + "']").parent().css('background-image', "url('img/seat_on.png')");
				jQuery("input[data-seatno='" + sheat + "']").parent().attr('onmouseover', 'this.style.backgroundImage="url(\'img/seat_on.png\')"');
			}
			*/
    });
    

    </script>
  </head>
  <!--<body background="img/tr.jpg" no repeat >-->
  <body style="background:url('img/floor.jpg');">
        
       <br><br>



<form action='payout.php' method='post'>

<?php

$theatre_name = $_SESSION["theatre"];
$movie_name = $_SESSION["movie"];

$seats_status = array();
for($seat = 1; $seat <= 120; $seat++) $seats_status[$seat] = 0;

include('config.php');

$screen = mysql_query("SELECT * FROM `screening` WHERE movie_name='$movie_name' AND theatre_name= '$theatre_name';");
//echo $movie_name;
//echo $theatre_name;
//echo $screen;
$row = mysql_fetch_assoc($screen);
$screen = $row['screen'];

$_SESSION["screen"] = $screen;

//echo $screen;

$result = mysql_query("SELECT * FROM `reservations` WHERE payment_status=1 AND theatre_name='$theatre_name' AND screen='$screen' AND movie_time='$show_date $show_time';");


while($row = mysql_fetch_assoc($result))
{
	$seat = $row['seat_no'];
	$seats_status[$seat] = 1;
}

$crc = 1;

for($seat = 1; $seat <= 96; $seat++, $crc++)
{
	$booked = "";
	//$disabled = "";
	//if($seat >= 39 && $seat <= 46) $disabled = "1";
	$space = "<span style='width:100px; display:inline-block;'></span>";
	if($crc % 10 == 3) print $space;
	if($crc % 100 == 11) print $space;
	$d = "";
	if($seat % 49 == 0) echo "<br/>\n";
	if($seats_status[$seat] == 1) {$d = 'checked disabled'; $booked = " booked";}
	//echo '<img src="seat.png" alt="6" height="80" width="80"><input name="$seat" type = "checkbox" data-seatno = "$seat" $d/>';
	//echo '<input class="cb" name="$seat" type = "checkbox" data-seatno = "$seat" $d/>';
	echo '<div class="cbr'.$booked.'"><input name="'.$seat.'" type = "checkbox" data-seatno = "'.$seat.'" '.$d.'/></div>';
	if($seat % 12 == 0) { echo "<br/>\n"; $crc = 0; }

}

?>

<div>
<img src="img/screen.png" width="850px" style="margin-left: -90px">
</div>

<input type='submit' style="position: fixed; right: 120px; bottom: 60px;" />
</form>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>