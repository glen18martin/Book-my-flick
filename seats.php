
<?php

					require 'config.php';
					session_start();

					$theatre_name = $_GET['theatre'];
			
					$_SESSION["theatre"] = "$theatre_name";


					?>



<!DOCTYPE html>
<html lang="en">
  <head>

    <script src = 'js/jquery-2.1.4.min.js'></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/tease.css">
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
		    	
		    	
		    	if($(this).is(':checked')) $(this).parent().addClass('booked');
		    	else  $(this).parent().removeClass('booked');

			});

    });
    

    </script>
  </head>
  <!--<body background="img/tr.jpg" no repeat >-->
  <body>
        
       <br><br>



<form action='success.php' method='post'>

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

$result = mysql_query("SELECT * FROM `reservations` WHERE theatre_name='$theatre_name' AND screen='$screen';");


while($row = mysql_fetch_assoc($result))
{
	$seat = $row['seat_no'];
	$seats_status[$seat] = 1;
}

$crc = 1;

for($seat = 1; $seat <= 96; $seat++, $crc++)
{
	$booked = "";
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

<input type='submit' />
</form>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>