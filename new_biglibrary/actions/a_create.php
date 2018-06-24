
<?php

 

require_once 'db_connect.php';

 

if($_POST) {

    $fname = $_POST['user_first_name'];

    $sname = $_POST['user_surname'];

    $email = $_POST['user_email'];

    $pass = $_POST['user_pass'];


 

    $sql = "INSERT INTO users (user_first_name, user_surname, user_email, user_pass) VALUES ('$fname', '$sname', '$email', '$pass')";

    if($connect->query($sql) === TRUE) {

        echo "<p>New Record Successfully Created</p>";

        echo "<a href='../create.php'><button type='button'>Back</button></a>";

        echo "<a href='../index.php'><button type='button'>Home</button></a>";

    } else {

        echo "Error " . $sql . ' ' . $connect->connect_error;

    }

 

    $connect->close();

}

 

?>