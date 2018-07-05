<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php"); // redirects to home.php
}
include_once 'db_connect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {

 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);
 $name = strip_tags($name);
 $name = htmlspecialchars($name);

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 // basic name validation
 if (empty($name)) {
  $error = true;
  $nameError = "Please enter your surname.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 } else {
  // check whether the email exist or not
  $query = "SELECT user_email FROM users WHERE user_email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
 if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have at least 6 characters.";
 }

 // password hashing for security
$password = hash('sha256', $pass);


 // if there's no error, continue to signup
 if( !$error ) {
  
  $query = "INSERT INTO users(user_surname,user_email,user_pass) VALUES('$name','$email','$password')";
  $res = mysqli_query($conn, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($email);
   unset($pass);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }
  
 }


}
?>

<!-- <div id="registration" class="text-center">
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
            <a href="#login" class="btn btn-default btn-lg page-scroll">Register</a> </div>
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
      <h2>Registration</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-6"> <img src="img/registration.jpg" class="img-responsive" alt="" height="250" width="250"> </div>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  

          
           <?php
  if ( isset($errMSG) ) {
  
   ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
       </div>

<?php
  }
  ?>
    
            <input type="text" name="name" class="form-control" placeholder="Enter Surname" maxlength="50" value="<?php echo $name ?>" />
      
               <span class="text-danger"><?php echo $nameError; ?></span>
          
  
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>
        
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passError; ?></span>
      
            <hr />
      
            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Register</button>
            <hr />
          
            <a href="index.php" >Go to Login!</a>
    
  
   </form>
    <!--   <form class="col-xs-12 col-md-6">
        Name: <input type="text" name="name"><br><br>
        Password: <input type="text" name="pwd"><br><br>
        <button onclick a href="actions/,,,php">Log In</button><br><br>
        <a href="registration.php"> <i>Are you registered yet?</i><a> 

        </form> -->
   
       </div>
    </div>
  </div>
</div>



<!-- <div id="registration" class="text-center">
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