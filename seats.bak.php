<?php

//print_r($_POST);

?>

<form action='success.php' method='post'>

<?php

/*session_start();

$name = $_SESSION["login"];
echo $name;
echo "<br/>\n";*/



$seats_status = array();
for($seat = 1; $seat <= 120; $seat++) $seats_status[$seat] = 0;

include('config.php');


$result = mysql_query("SELECT * FROM `reservations`;");


while($row = mysql_fetch_assoc($result))
{
	$seat = $row['seat_no'];
	$seats_status[$seat] = 1;
}

//print_r($seats_status);


for($seat = 1; $seat <= 120; $seat++)
{
	$d = "";
	if($seat % 61 == 0) echo "<br/>\n";
	//if($seat % 10 == 3) echo "\t";
	if($seats_status[$seat] == 1) $d = 'checked disabled';
	echo "<input name='$seat' type = 'checkbox' data-seatno = '$seat' $d/>\n";
	if($seat % 12 == 0) echo "<br/>\n";
}

?>
<input type='submit'/>
</form>

