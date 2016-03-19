<?php
	
 $name = $_POST['name'];
 $pass = $_POST['pass'];
 $email = $_POST['email'];
 $dob = $_POST['dob'];
 

 
 echo "It worked ! Thank you for signing up with us $name !";

 mysql_connect("localhost", "root", "");
 mysql_select_db("book-my-flick");

mysql_query("INSERT INTO `users` VALUES('$name','$dob','$email','$pass')");




?>
