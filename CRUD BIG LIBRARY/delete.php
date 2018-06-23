<?php

 

require_once 'actions/db_connect.php';

 

if($_GET['user_ID']) {

    $id = $_GET['user_ID'];

 

    $sql = "SELECT * FROM users WHERE user_ID = {$id}";

    $result = $connect->query($sql);

    $data = $result->fetch_assoc();

 

    $connect->close();

?>

 

<!DOCTYPE html>

<html>

<head>

    <title>Delete User</title>

</head>

<body>

 

<h3>Do you really want to delete this user?</h3>

<form action="actions/a_delete.php" method="post">

 

    <input type="hidden" name="user_ID" value="<?php echo $data['user_ID'] ?>" />

    <button type="submit">Yes, delete it!</button>

    <a href="index.php"><button type="button">No, go back!</button></a>

</form>

 

</body>

</html>

 

<?php

}

?>