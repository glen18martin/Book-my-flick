<?php


require 'config.php';

session_start();

$movie_input =  $_SESSION["movie_input"];
$theatre_input = $_SESSION["theatre_input"];



if($movie_input * $theatre_input == 0){
		
	


		if($theatre_input == 1)
		{
			$theatre_name = $_GET['theatre'];
			$_SESSION["theatre"] = "$theatre_name";
			//echo $theatre_name;
			header("Location:movies.php");
		}


		elseif ($movie_input == 1) {
			$movie_name = $_GET['mov'];
			$_SESSION["movie"] = "$movie_name";
			//echo $movie_name;
			header("Location:theatres.php");
		}



		



		

	}
	 elseif($movie_input * $theatre_input == 1){
		header("Location:seats.php");
	}
	





				//$theatre_name = $_GET['theatre'];
			
					//$_SESSION["theatre"] = "$theatre_name";

					//echo $theatre_name;


  					//$movie_name = $_GET['mov'];
					//echo $movie_name;

					//$_SESSION["movie"] = "$movie_name";






?>