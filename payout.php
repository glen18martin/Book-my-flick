<?php

require 'config.php';

session_start();


$name = $_SESSION["login"];
$checklog = $_SESSION["checklog"];
//echo $checklog;
if ($checklog == 'off') {
  header("Location:signinup.html");
}



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


$movie = mysql_query("SELECT * FROM `movies` WHERE movie_name='$movie_name';");

$row = mysql_fetch_assoc($movie);
$lang = $row['language'];

$_SESSION["lang"] = $lang;

$genre = $row['genre'];

$_SESSION["genre"] = $genre;

$rating = $row['rating'];

$_SESSION["rating"] = $rating;


//echo "Seats successfully booked";
//echo "<br/>\n";

$seat = array();
$seat = $_POST;

//$_SESSION = $seat;


$price = 0;

foreach ($seat as $key => $value) {

	$price++;

	$result = mysql_query("SELECT * FROM reservations WHERE seat_no = '$key' AND theatre_name='$theatre_name' AND screen='$screen' AND movie_time='$day $time'");

if(mysql_num_rows($result) == 0) {
	
	  // echo $key;
	  // echo "<br/>\n";

	  mysql_query( "INSERT INTO `reservations` VALUES ('$theatre_name', '$screen', '$key','$day $time', '$name' , CURRENT_TIMESTAMP,0)") or die(mysql_error());

		//echo "<br/>\n";

	}
}

$num = $price;

$rate = mysql_query("SELECT * FROM `screening` WHERE movie_name='$movie_name' AND theatre_name= '$theatre_name' AND screen='$screen';");

$row = mysql_fetch_assoc($rate);
$rate = $row['rate'];

//echo "Number of seats = " . $price;
 
//echo "<br>\n Ticket Rate : " . $rate;

$price = $price * $rate;

//echo "<br>\n Total Price : ".$price;

?>






<!DOCTYPE html>
<html lang="en">
  <head>
   <script src="js/jquery.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book my Flick!</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="nav.css">
      
      <link rel="icon" href="img/logo.ico">

      <link href="css/back.css" rel="stylesheet">
  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Navigation -->
    
 <!--Navbar-->
 <nav class="navbar navbar-inverse" >
        <div class="container-fluid" style="font-size:16px">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html" style="padding:7px 10px 0px 20px "><img src="img/bmflogo.png" width="70px" /></a>
          <a class="navbar-brand" href="index.html">Book my Flick!</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
            <ul class="nav navbar-nav navbar-right">
            <li class="#"><a href="main.html">Home <span class="sr-only">(current)</span></a></li>
          
                    <li>
                        <a href="main.html#about">About</a>
                    </li>
                   
                    <li><a href="theatre_browse.html">Theatres</a></li>
                    <li><a href="movies_browse.html">Movies</a></li>
                    <li><a href="video.html">Trailers</a></li>
                      
                                      <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><?php echo $name?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <ul><li><a href="user.php" >Profile</a></li>
                              <li><a href="signinup.html" style="color: lightblue;">Logout</a></li>
                            </ul>
                          </li>



                   
                        
                   </ul>
                  

        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

  </head>
 
  <style type="text/css">
  /* body { background: black !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */

   p {color: #bbbbbb;}
    

</style>
  
  
    

  

  <div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-8">
            <img style="float:left;width:300px;height:420px; margin-right:20px;margin-top: auto;margin-left: auto; border: 2px solid #e6e6e6" class="img-rounded" src="<?php echo 'poster/' . $movie_name . '.jpg'; ?>" />
            
            <p class="lead">Username: <?php echo $name; ?></p>
            <p class="lead">Movie: <?php echo $movie_name; ?></p>
            <p class="lead">Theatre: <?php echo $theatre_name; ?></p>
            <p class="lead">Screen: <?php echo $screen; ?></p>
            <p class="lead">Number of tickets: <?php echo $num; ?></p>
            <p class="lead">Date:  <?php echo $day; ?></p>
            <p class="lead">Time:  <?php echo $time; ?></p>
       
            <p class="lead">Rate:₹ <?php echo $rate; ?></p>
            <p class="lead">Price:₹ <?php echo $price; ?></p>
            
            <p class="lead">Language: <?php echo $lang; ?></p>
            <p class="lead">Genre: <?php echo $genre; ?></p>

            <p class="lead">Ratings:
            	<?php 
            	for ($i=0; $i < $rating ; $i++) { 
            		echo '<span class="glyphicon glyphicon-star"  aria-hidden="true"></span>';
            	}

            	for ($i=$rating; $i < 5 ; $i++) { 
            		echo '<span class="glyphicon glyphicon-star-empty"  aria-hidden="true"></span>';
            	}

            	?>
                 </p>

           <!-- <p class="lead">Ratings: <?php echo $rating; ?> Stars 
            <span class="glyphicon glyphicon-star-empty"  aria-hidden="true"></span>
            <span class="glyphicon glyphicon-star-empty"  aria-hidden="true"></span>
            <span class="glyphicon glyphicon-star-empty"  aria-hidden="true"></span>
            <span class="glyphicon glyphicon-star-empty"  aria-hidden="true"></span>
            <span class="glyphicon glyphicon-star-empty"  aria-hidden="true"></span></p>-->

<!--<form id="pay" action="" method="">-->
            <button type="submit" class="btn btn-success btn-lg" id='showpaynow'><a data-toggle="modal" data-target="#payupbro" style="color: #ffffff;text-decoration: underline;">Pay</a></button>
            <button type="button" class="btn btn-success btn-lg">Print</button>
<!-- </form> -->         

		<script>
		$(document).ready(function() { 

			$("#showpaynow").on('click', function() {
				$("#payupbro").fadeIn();
			});

			$("#paynow").on('click', function() {
				$.post("pay.php", function(data) {

					alert("Transaction Complete Thank You!");
					$("#showpaynow").text("PADE").attr('disabled', 1);
					$("#payupbro").fadeOut();
					window.location = "user.php";
				});
			});
		});
		</script>
          
        </div> <!---->

        <div class="col-md-4">

        <canvas id='ticket' width="637" height="1561" style="border:1px solid grey; height:600px;  right: 300px; top: 80;"></canvas>

        </div>
        <script>
        var canvas = document.getElementById('ticket');
        var ctx = canvas.getContext("2d");
   	
   		var img = new Image();
   		img.src = "img/ticket.jpg";

   		var mbg = new Image();
   		mbg.src = "<?php echo 'poster/' . $movie_name . '.jpg'; ?>";

   		img.onload = function() { 
    		ctx.drawImage(img, 0, 0);

    		ctx.font = "bold 55px Arial";
    		ctx.textAlign = "center";

			ctx.fillText("<?php echo $theatre_name; ?>", 637/2, 60);

			ctx.drawImage(mbg, 0, 78, 637, 966-78);

			ctx.fillText("<?php echo $movie_name; ?>", 637/2, 1020);

			<?php
				$seatString = " | ";
				$seatCount = 0;
				foreach($_POST as $key => $val) {
						if($seatCount++ > 0) $seatString .= ", ";
						 $seatString .= $key;
				}
			?>

			ctx.fillText("<?php echo "Screen " . $screen . $seatString; ?>", 637/2, 1110);




			<?php 

			$dayx = date("d", strtotime($day)); 
			$monthx = date("M", strtotime($day)); 

			?>
			ctx.fillText("<?php echo $dayx; ?>", 110, 1300);
			ctx.fillText("<?php echo $monthx; ?>", 540, 1300);
			ctx.fillText("<?php echo substr($time,0,5); ?>", 637/2, 1300);

			ctx.fillText("ADMISSION", 637/2, 1545);

    	};


    	

        </script>
        <!--<div class="col-md-6"></div>-->
    </div>
  
  </div>



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

         <div class="col-md-3" style="font-family:'Cantarell',cursive;"><h4 style="font-size: 19px;color:#968afc; font-family: 'Courgette',cursive;">Contact Us</h4><a data-toggle="modal" data-target="#message" style="color: #ffffff;text-decoration: underline;">Leave us a message</a></div>

         <div class="col-md-2" style="font-family:'Cantarell',cursive;"><h4 style="color: #f9fe44;font-size: 19px; font-family: 'Courgette',cursive;">Project Team</h4>Nathaneal (21)<br>Glen (32)<br>Linson (36)<br>Preetham (37)<br>Amey (39)<br>Swapnil (40)</div>

         <div class="col-md-1"><img src="img/bird.png" height="150px"></div>
          
          </div>
 
        </div>


        <hr><p style="text-align: center">&copy; 2016 - G1en18 / WebDev<br>All Rights Reserved</p><br>
        </div>
        <!--final footer end-->




        
        <!--Modal-->

         <div id="message" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style="background-color: #1d4e89;border-color: #1d4e89">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="color: #ffffff">We would love to hear from you !</h4>
                </div>
                <div class="modal-body" style="background-color: #e8e8e8">
                 
                <form id="feedback">
                <input type="text" style="border-color: #1d4e89;" placeholder="Name" required><br>
                <br><input type="text" style="border-color: #1d4e89;" placeholder="Email Id"><br><br>
                <textarea rows="5" placeholder="Comments" class="form-control" style="resize:none;padding: 2px;border-color:#1d4e89;border-width:2px;"></textarea><br>
               
                </form>


                </div>
                <div class="modal-footer" style="background-color: #1d4e89;border-color:#1d4e89">
                  <button type="submit" class="btn btn-default" value="Submit" form="feedback" style="background-color: #e8e8e8;border-color: #9dc6d8">Submit</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #e8e8e8;border-color: #9dc6d8">Close</button>
                </div>
              </div>

            </div>
          </div>
        <!--Modal end-->

<div id="payupbro" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                
<!-- CREDIT CARD FORM STARTS HERE -->
<div class="panel panel-default credit-card-box">
<div class="panel-heading display-table" >
<div class="row display-tr" >
<h3 class="panel-title display-td" style="text-align: center;">Payment Details</h3>
<div class="display-td" >                            
<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
</div>
</div>                    
</div>
<div class="panel-body">
<div role="form" id="payment-form">
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label for="cardNumber">CARD NUMBER</label>
<div class="input-group">
<input 
type="tel"
class="form-control"
name="cardNumber"
placeholder="Valid Card Number"
autocomplete="cc-number"
required autofocus 
/>
<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
</div>
</div>                            
</div>
</div>
<div class="row">
<div class="col-xs-7 col-md-7">
<div class="form-group">
<label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
<input 
type="tel" 
class="form-control" 
name="cardExpiry"
placeholder="MM / YY"
autocomplete="cc-exp"
required 
/>
</div>
</div>
<div class="col-xs-5 col-md-5 pull-right">
<div class="form-group">
<label for="cardCVC">CV CODE</label>
<input 
type="tel" 
class="form-control"
name="cardCVC"
placeholder="CVC"
autocomplete="cc-csc"
required
/>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label for="couponCode">COUPON CODE</label>
<input type="text" class="form-control" name="couponCode" />
</div>
</div>                        
</div>
<div class="row">
<div class="col-xs-12">
<button class="btn btn-success btn-lg btn-block" type="submit" id="paynow">Pay Now!</button>
</div>
</div>
<div class="row" style="display:none;">
<div class="col-xs-12">
<p class="payment-errors"></p>
</div>
</div>
</div>
</div>
</div>            
<!-- CREDIT CARD FORM ENDS HERE -->


              </div>

            </div>
          </div>
        <!--Modal end-->






  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>