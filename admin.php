<?php

require 'config.php';

session_start();


$name = $_SESSION["login"];


if($name != "Admin") { header('Location: user.php'); die; }

$checklog = $_SESSION["checklog"];
//echo $checklog;
if ($checklog == 'off') {
  header("Location:signinup.html");
}



?>




<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book my Flick!</title>
    <style type="text/css">
    .cancelbooking {
      float:right;
      cursor: pointer;
      color: red;
}
.cancelbooking:hover {
      font-weight: bold;
}
      </style>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
      

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" type="text/css" href="nav.css">
  <link href="css/back.css" rel="stylesheet">
  <link rel="icon" href="img/logo.ico">


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
          <a class="navbar-brand" href="index.html" style="padding:7px 10px 0px 20px "><img src="img/bmflogo.png" width="70px" /></a>
          <a class="navbar-brand" href="index.html">Book my Flick!</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
            
            <ul class="nav navbar-nav navbar-right">

                <li class="#"><a href="main.html">Home</a></li>
                    <li>
                        <a href="main.html#about">About</a>
                    </li>
                    
                    <li><a href="theatre_browse.html">Theatres</a></li>
                    <li><a href="movies_browse.html">Movies</a></li>
                    <li><a href="video.html">Trailers</a></li>
                      
                                      <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $name?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <ul><li><a href="user.php" >Profile</a></li>
                              <li><a href="logout.php" style="color: lightblue;">Logout</a></li>
                            </ul>
                          </li>



                   
                        
                   </ul>
                  

        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
  

  </head>
  <body>
  <style type="text/css">
   
    
    p {
        font-size: 1.2em;
        .btn {
            padding: 0.5em;
        }
    }
}

</style>
  <div class="container">
   <div class="container">
    <div class="row">
        <div class="col-md-4">
            <img style="float:left;width:290px;height:400px; margin-right:20px;margin-top: auto;margin-left: auto;margin-bottom: 20px" class="img-rounded" src="img/iron.jpg" />
            <br><p class="lead" style="color: #ffffff;margin-left: 40px;">Username: <?php echo $name; ?></p><br>

             <br><div style="margin-top: -40px;margin-left: 105px"><button type="button"><a href="select.php">Book Now!</a></button></div>

            </div>

             <div class="col-md-8">            
            
            <!--
            <div class="row well">
              
                  <?php
              $result = mysql_query("SELECT * FROM reservations WHERE customer_name='$name' AND movie_time > NOW()");

              while($row = mysql_fetch_assoc($result))
                  {
                    $theatre = $row['theatre_name'];
                     $screen = $row['screen'];
                      $seat = $row['seat_no'];
                       $time = $row['movie_time'];

                       $mov = mysql_query("select movie_name from screening where theatre_name='$theatre' AND screen='$screen' limit 1");
                       $mov = mysql_fetch_array($mov);
                    
                    echo $mov[0] ; echo ' - ';
                    echo $theatre ; echo ' - ';
                    echo $screen ; echo ' - ';
                    echo $seat ; echo ' - ';
                    echo $time ;

                    echo "<div class='cancelbooking'  data-seat='" . $row['seat_no'] . "' data-booking='" . $row['booking_time'] . "'>(Cancel)</div>";
                    echo'<hr>';
                  }

              ?>


            </div>
           -->

            <div class="row well">
              
                  <?php



                $result = mysql_query("SELECT * FROM users;");
              echo "<b>Total registered accounts:</b> " . mysql_num_rows($result);


              $result = mysql_query("SELECT * FROM reservations;");
              echo "<br/><b>Total reservations in database:</b> " . mysql_num_rows($result);
              
              $result = mysql_query("SELECT * FROM reservations where booking_time > '".  date("Y-m-d 00:00:00") ."'");
              echo "<br/><b>Total reservations Today:</b> " . mysql_num_rows($result);

              echo "<hr style='border-color:Red'/>";
              $result = mysql_query("SELECT * FROM theatres;");
              echo "<b>Theatres parternered with:</b> <br/>";

              while($row = mysql_fetch_array($result)) {
                echo $row[1];
                echo '<br/>';
              }


              echo "<hr style='border-color:Red'/>";

              $result = mysql_query("SELECT * FROM users;");
              echo "<b>Registered Users:</b> <br/>";

              while($row = mysql_fetch_array($result)) {
                if($row[0] == "Admin") continue;
                echo $row[0];
                echo "<div class='cancelbooking' data-user='".$row[0]."'> (delete)</div>";
                echo '<br/>';
              }



              echo "<hr style='border-color:Red'/>";


              ?>


            <br/>
            Cancel all reservations before this date: <input id='candate' type='date'/>
            <button id='cancelresv'>Cancel</button>
            </div>

           
        </div>
    </div>
  
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


        <hr><p style="text-align: center;">&copy; 2016 - G1en18 / WebDev<br>All Rights Reserved</p><br>
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
                <br><input type="email" style="border-color: #1d4e89;" placeholder="Email Id"><br><br>
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



    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


    <script>
    $(document).ready(function() { 
        $('.cancelbooking').on('click', function() {
          var user = $(this).attr('data-user');

          var result = confirm("Are you sure you want to delete this user?");
          if(result) {

            $.post('cancel.php?deleteuser=' + user, {}, function(data) {
                  alert("User deleted!");
                 location.reload();
              });
          }

        });

         $('#cancelresv').on('click', function() {
          var date = $("#candate").val();
          var result = confirm("Are you sure you want to cancel all reservations before this date?");
          if(result) {

            $.post('cancel.php?deletedate=' + date, {}, function(data) {
              alert(data);
                  alert("Reservations deleted!");
                 location.reload();
              });
          }

        });

    });
    </script>
  </body>
</html>