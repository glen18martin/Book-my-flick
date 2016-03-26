<?php

require 'config.php';


	
if ($_POST['form']==0) {
	
 $name = $_POST['name'];
 $pass = $_POST['pass'];
 $passcheck = $_POST['passcheck'];
 $email = $_POST['email'];
 $dob = $_POST['dob'];


 
 if($pass == $passcheck)
 {
   $pass = md5($pass); //encryption
   //Check if username is taken
   $check = mysql_query("SELECT * FROM users WHERE U_email = '$email'")or die(mysql_error());
   if (mysql_num_rows($check)>=1) echo "User already exists";
   //Put everyting in DB
   else{
   mysql_query("INSERT INTO `users` VALUES('$name','$dob','$email','$pass')") or die(mysql_error());
    header("Location:select.php");
   //echo "Registration Successful";

   }
 }
 else{
  echo "Sorry, your passwords do not match. <br />";
 }


}


else  {

session_start();
 $checkid = $_POST['checkid'];
 $checkpass = $_POST['checkpass'];

$checkpass = md5($checkpass);

$result = mysql_query("SELECT U_name FROM users WHERE U_email = '$checkid' AND Password = '$checkpass'");

if(mysql_num_rows($result) == 0) {
     echo "Check username or password";
} else {
//    echo "Found user Successfully";
 header("Location:select.php");




$row = mysql_fetch_array($result);
$name = $row['U_name'];
$_SESSION["login"]="$name";



}

}






?>