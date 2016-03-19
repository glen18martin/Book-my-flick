<?php
	

 $checkid = $_POST['checkid'];
 $checkpass = $_POST['checkpass'];

 
 
 mysql_connect("localhost", "root", "");
 mysql_select_db("book-my-flick");



$result = mysql_query("SELECT U_name FROM users WHERE U_email = '$checkid' AND Password = '$checkpass'");

if(mysql_num_rows($result) == 0) {
     echo "Not found";
} else {
    echo "Found user Successfully";
}


?>
