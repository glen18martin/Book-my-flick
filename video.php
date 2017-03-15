

<?php

require 'config.php';

session_start();

$name = $_SESSION["login"];

?>







<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book my Flick!</title>

    <!-- Bootstrap -->
	<script src="js/aud.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
    <link rel="stylesheet" type="text/css" href="css/custom.css">
   	<!--<link rel="stylesheet" type="text/css" href="css/construct.css">
-->
   	<style>
	body {background-image: url("img/vidwall2.jpg");
     background-repeat: no-repeat;
     background-size: cover;

     background-attachment: fixed;}
	</style>

     <link rel="icon" href="img/logo.ico">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    

 <!--Navbar-->
 <nav class="navbar navbar-inverse">
        <div class="container-fluid" style="font-size:16px">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html" style="padding:7px 10px 0px 20px "><img src="img/Gmain.png" width="50px" /></a>
          <a class="navbar-brand" href="index.html">Book my Flick!</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         
            <ul class="nav navbar-nav navbar-right">
            		<li class="#"><a href="main.html">Home </a></li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    
                    <li><a href="theatre_browse">Theatres</a></li>
                    <li><a href="movie_browse">Movies</a></li>
                    <li class="active"><a href="video.php">Trailers</a></li>
                    <li><a href="signinup.html">Login</a></li>              
                        
                   </ul>
                  

        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
	
	<div class="container">

			<div class="col-md-6">
			<div class="panel panel-default">
			 <div class="panel-heading">Movie Of The Month</div>
			  <div class="panel-body">
			  <video width="300" controls>
				  <source src="vid/Thejunglebook.mp4" type="video/mp4">
				  <!--<source src="mov_bbb.ogg" type="video/ogg">-->
				  Your browser does not support HTML5 video.
				</video>
				</div>
			</div>
			</div>
						

			<div class="col-md-6">
			<div class="panel panel-default">
			 <div class="panel-heading">New Movie Release (Animated)</div>
			  <div class="panel-body">
			  <video width="700" controls >
				  <source src="vid/Zootopia.mp4" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>
				</div>
			</div>
		
			</div>
			

			<div class="col-md-6">
			<div class="panel panel-default">
			 <div class="panel-heading">Hand-Picked!</div>
			  <div class="panel-body">
			  <video width="300" controls>
				  <source src="vid/limitless.mp4" type="video/mp4">
				  <!--<source src="mov_bbb.ogg" type="video/ogg">-->
				  Your browser does not support HTML5 video.
				</video>
				</div>
			</div>
			</div>
						

			<div class="col-md-6">
			<div class="panel panel-default">
			 <div class="panel-heading">New Trailer!</div>
			  <div class="panel-body">
			  <video width="700" controls>
				  <source src="vid/civil_war.mp4" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>
				</div>
			</div>
		
			</div>



			<div class="col-md-6">
			<div class="panel panel-default">
			 <div class="panel-heading">Going Mad!</div>
			  <div class="panel-body">
			  <video width="300" controls>
				  <source src="vid/suicide.mp4" type="video/mp4">
				  <!--<source src="mov_bbb.ogg" type="video/ogg">-->
				  Your browser does not support HTML5 video.
				</video>
				</div>
			</div>
			</div>
						

			<div class="col-md-6">
			<div class="panel panel-default">
			 <div class="panel-heading">Lets get Angry!!!</div>
			  <div class="panel-body">
			  <video width="700" controls>
				  <source src="vid/angryb.mp4" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>
				</div>
			</div>
		
			</div>
			


			<div class="col-md-6">
			<div class="panel panel-default">
			 <div class="panel-heading">New TV Show</div>
			  <div class="panel-body">
			  <video width="700" controls>
				  <source src="vid/lucifer.mp4" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>
				</div>
			</div>
		
			</div>



			<div class="col-md-6">
			<div class="panel panel-default">
			 <div class="panel-heading">Spectacular!</div>
			  <div class="panel-body">
			  <video width="700" controls>
				  <source src="vid/spiderman.mp4" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>
				</div>
			</div>
		
			</div>
			
			


	

	</div><!--container-->


			<!--Final Footer-->

		  <br><br>	

		  <div class="container-fluid" style="background-color: black;color: white;font-size: 14px">
          <div class="container">
          <div style="font-size:14px;padding-top: 25px" class="row" style="padding: 25px">
          
          <div class="col-md-3" style="font-family:'Cantarell',cursive;"><h4 style="color: #67ffB3;font-size: 19px; font-family: 'Courgette',cursive;">Made by G1en18</h4>
            <address>DBIT<br>Kurla,<br>Mumbai.</address></div>

          <div class="col-md-3">
          <h4 style="font-size: 19px;color: #ff4171; font-family: 'Courgette',cursive;">Stay Connected!</h4>
	          <div style="padding-left: 20">
	          <a class="facebook" href="#"><img src="img/fbico.png" height="40px" /></a>

	          <a class="g+" href="#"><img src="img/g+ico.png" height="40px" /></a>

			  <a class="git" href="https://github.com/glen18martin"><img src="img/githubico.png" height="40px" /></a>

	          </div>
	       </div>

	        <div class="col-md-3" style="font-family:'Cantarell',cursive;"><h4 style="font-size: 19px;color:#968afc; font-family: 'Courgette',cursive;">Contact Us</h4>Leave us a message</div>

	        <div class="col-md-2" style="font-family:'Cantarell',cursive;"><h4 style="color: #f9fe44;font-size: 19px; font-family: 'Courgette',cursive;">Project Team</h4>Nathaneal (21)<br>Glen (32)<br>Linson (36)<br>Preetham (37)<br>Amey (39)<br>Swapnil (40)</div>


	       <div class="col-md-1"><img src="img/bird.png" height="150px"></div>
          
          </div>
 
        </div>


        <hr><p>&copy; 2016 - G1en18 / WebDev<br>All Rights Reserved</p><br>
        </div>
        <!--final footer end-->

	
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>