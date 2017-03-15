<?php

require 'config.php';

session_start();

$name = $_SESSION["login"];


$checklog = $_SESSION["checklog"];
//echo $checklog;
if ($checklog == 'off') {
  header("Location:signinup.html");
}






?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book my Flick!</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">
     
      <link href="nav.css" rel="stylesheet">
      <link href="css/back.css" rel="stylesheet">
      <link rel="icon" href="img/logo.ico">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
                    <li><a href="movie_browse.html">Movies</a></li>
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
    


      <?php
     
    $_SESSION["movie_input"] = 1;

    $test =  $_SESSION["movie_input"];
        ?>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color: #ffffff">Movies
                    
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Civil War<h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Civil War" onclick="post">
                    <img class="img-responsive" src="poster/Civil War.jpg" alt="">
                </a>
                </div>
            </div>
           <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Raees<h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Raees" onclick="post">
                    <img class="img-responsive" src="poster/Raees.jpg" alt="">
                </a>
                </div>
            </div>
           <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Fan<h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Fan" onclick="post">
                    <img class="img-responsive" src="poster/Fan.png" alt="">
                </a>
                </div>
            </div>
            <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Batman v Superman</h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Batman v Superman" onclick="post">
                    <img class="img-responsive" src="poster/Batman v Superman.jpg" alt="">
                </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">The Jungle Book</h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=The Jungle Book" onclick="post">
                    <img class="img-responsive" src="poster/The Jungle Book.jpg" alt="">
                </a>
                </div>
            </div>
           <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Warcraft</h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Warcraft" onclick="post">
                    <img class="img-responsive" src="poster/Warcraft.jpg" alt="">
                </a>
            </div>
            </div>
            <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Kung Fu Panda 3</h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Kung Fu Panda 3" onclick="post">
                    <img class="img-responsive" src="poster/Kung Fu Panda 3.jpg" alt="">
                </a>
                </div>
            </div>
            <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Suicide squad</h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Suicide squad" onclick="post">
                    <img class="img-responsive" src="poster/Suicide squad.jpg" alt="">
                </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Angry Birds</h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Angry Birds" onclick="post">
                    <img class="img-responsive" src="poster/Angry Birds.jpg" alt="">
                </a>
                </div>
            </div>
           <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Sausage Party</h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Sausage party" onclick="post">
                    <img class="img-responsive" src="poster/Sausage Party.jpg" alt="">
                </a>
                </div>
            </div>
           <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Ice Age Collision course</h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Ice Age Collision course" onclick="post">
                    <img class="img-responsive" src="poster/Ice Age Collision course.jpg" alt="">
                </a>
                </div>
            </div>
            <div class="col-md-3 portfolio-item panel panel-default" style="border-color: black">
            <div class="panel-heading" style="background-color: black"><h5 style="color: white">Ratchet & Clank</h5></div>
            <div class="panel-body">
                <a href="theatres.php?mov=Ratchet & Clank" onclick="post">
                    <img class="img-responsive" src="poster/Ratchet & Clank.jpg" alt="">
                </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                   <!-- <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>-->
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

 


            </div>
    <!-- /.container -->

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



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
