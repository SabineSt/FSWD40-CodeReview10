
<?php

 

require_once 'db_connect.php';

 

if($_POST) {

    $fname = $_POST['user_first_name'];

    $sname = $_POST['user_surname'];

    $email = $_POST['user_email'];

    $pass = $_POST['user_pass'];


 

    $id = $_POST['user_ID'];

 

    $sql = "UPDATE users SET user_first_name = '$fname', user_surname = '$sname', user_email = '$email' user_pass = $pass WHERE user_ID = {$id}";

    if($connect->query($sql) === TRUE) {

        echo "<p>Succcessfully Updated</p>";

        echo "<a href='../update.php?id=".$id."'><button type='button'>Back</button></a>";

        echo "<a href='../index.php'><button type='button'>Home</button></a>";

    } else {

        echo "Erorr while updating record : ". $connect->error;

    }

 

    $connect->close();

 

}

 

?>