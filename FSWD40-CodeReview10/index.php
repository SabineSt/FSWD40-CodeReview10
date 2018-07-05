<?php
ob_start();
session_start();
require_once 'db_connect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

 // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if (!$error) {
  
  $password = hash('sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT user_ID, user_surname, user_pass FROM users WHERE user_email='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
  
  if( $count == 1 && $row['user_pass']==$password ) {
   $_SESSION['user'] = $row['user_ID'];
   header("Location: home.php");
  } else {
   $errMSG = "Incorrect Credentials, Try again...";
  }
  
 }
 }
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
            <a href="#login" class="btn btn-default btn-lg page-scroll">Log in</a> </div>
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
          <li> <a class="page-scroll" href="#login">Log In</a> </li>
<!--           <li> <a class="page-scroll" href="#registration">Registration</a> </li>
 -->          <li> <a class="page-scroll" href="#media">Media</a> </li>
<!--           <li> <a class="page-scroll" href="#testimonials">Testimonials</a> </li>
 -->          <li> <a class="page-scroll" href="#registration">Registration</a> </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<!-- Login Section -->
<div id="login">
  <div class="container">
    <div class="section-title text-center center">
      <h2>Log In</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-6"> <img src="img/about.jpeg" class="img-responsive" alt=""> </div>
       <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  
                
           <?php
  if ( isset($errMSG) ) {
echo $errMSG; ?>
              
               <?php
  }
  ?>
          
          
            
            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
        
            <span class="text-danger"><?php echo $emailError; ?></span>
  
          
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
        
           <span class="text-danger"><?php echo $passError; ?></span>
            <br><hr />
            <button type="submit" name="btn-login">Sign In</button><br><br>
          
            <a href="register.php">Are you registered yet?</a>
            <hr>
      
          
   </form>
      <!-- <form class="col-xs-12 col-md-6">
        Name: <input type="text" name="name"><br><br>
        Password: <input type="text" name="pwd"><br><br>
        <button onclick a href="actions/,,,php">Log In</button><br><br>
        <a href="registration.php"> <i>Are you registered yet?</i><a> 

        </form> -->
   
       </div>
    </div>
  </div>
</div>


<!-- 
<div id="registration" class="text-center">
  <div class="overlay">
    <div class="container">
      <div class="section-title text-center center">
        <h2>Registration</h2>
        <hr>
      </div>
      <div class="row">
        
      </div>
      <div class="col-xs-12 col-md-6">

        <form action="actions/a_create.php" method="post" name="registration" id="registration" >
              First Name: <input type="text" name="fname"><br><br>
                 Surname: <input type="text" name="sname"><br><br>
                  E-mail: <input type="text" name="email"><br><br>
                Password: <input type="text" name="pwd"><br><br>
       
                <button type="submit">Add user</button>
                <a href="index.php"><button type="button">Back</button></a>
          </form>
   
          <div id="success"></div>
          <button type="submit" class="btn btn-default">Log Out</button>
        </form>
   
      </div>
    </div>
  </div>
</div> -->
<div id="footer">

</div>

</body>
</html>