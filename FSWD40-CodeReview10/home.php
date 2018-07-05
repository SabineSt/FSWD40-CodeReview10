
<?php
ob_start();
session_start();
require_once 'db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users detail
$res=mysqli_query($conn, "SELECT * FROM users WHERE user_ID=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Big Library</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>


</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Header -->
<header id="header">
  <div class="intro text-center">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
            <h1>The Big Library</h1><br><br>
            <p>* The special experience *<br><br><br>We offer a broad variety of media, <br> from educational to popular & light fiction literature.<br><br> Surely you will find your next favourtie piece here with us!</p>
            <a href="logout.php?logout" class="btn btn-default btn-lg page-scroll">Log out</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Navigation -->
<div id="nav">
  <nav class="navbar navbar-custom">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
      </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-main-collapse">
        <ul class="nav navbar-nav">
          <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
          <li class="hidden"> <a href="#page-top"></a> </li>
          <li> <a class="page-scroll" href="#page-top">Home</a> </li>
          <li> <a href="index.php?index">Log In</a> </li>
<!--           <li> <a class="page-scroll" href="#registration">Registration</a> </li>
 -->          <li> <a class="page-scroll" href="#media">Media</a> </li>
<!--           <li> <a class="page-scroll" href="#testimonials">Testimonials</a> </li>
 -->          <li> <a href="register.php?register">Registration</a> </li>
        </ul>
      </div>
    </div>
  </nav>
</div>


<!-- Media Section -->
<div id="media">
  <div class="container">
    <div class="section-title text-center center">
      <h2>Media</h2>
      <hr>
    </div>
    <div class="categories">

        <ul class='cat'>
               <li>
          <ol class='type'>
            <li><a href='*' data-filter='*' class='active'>All</a></li>
            <li><a href='#media' data-filter='.web'>Books</a></li>
            <li><a href='#media' data-filter='.app'>CDs</a></li>
            <li><a href='#media' data-filter='.branding'>DVDs</a></li>
          </ol>
        </li>
      </ul>

           <div class='clearfix'></div>
    </div>
        <div class='row'>
    
       


        <?php

        $sql= "SELECT media.img, media.title, media.short_description, author.surname, media_type.data_type FROM ((media inner join author on media.fk_author = author.ID)
           inner join media_type on media.fk_media_type = media_type.ID)";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

             while ($row = mysqli_fetch_assoc($result))
             {
               echo "      

               <div class='media-items'>
                            <div class='col-sm-6 col-md-3 col-lg-3 web'>

                   <div class='media-item'>
            <div id='media' class='hover-bg'> <a href='".$row['img']."'".$row['short_description']."title='Project description' rel='prettyPhoto'>
              <div class='hover-text'>
                <h4>".$row['title']."</h4>
                <small>".$row['surname']."</small> </div>
              <img src='".$row['img']."' class='img-responsive' alt='Project Title'> </a> </div>
          </div>
        </div>
      </div>
    </div>";
                   }
             } else {

                echo "<tr><td colspan='5'><center>No Data Available</center></td></tr>";

            }
     

            ?>



    </div>
       </div>

</body>
</html>

<?php ob_end_flush(); ?>

