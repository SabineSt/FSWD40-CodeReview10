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

    <title>Edit User</title>

 

    <style type="text/css">

        fieldset {

            margin: auto;

            margin-top: 100px;

            width: 50%;

        }

 

        table tr th {

            padding-top: 20px;

        }

    </style>

 

</head>

<body>

 

<fieldset>

    <legend>Update user</legend>

 

    <form action="actions/a_update.php" method="post">

        <table cellspacing="0" cellpadding="0">

            <tr>

                <th>First Name</th>

                <td><input type="text" name="user_first_name" placeholder="First Name" value="<?php echo $data['user_first_name'] ?>" /></td>

            </tr>     

            <tr>

                <th>Surname</th>

                <td><input type="text" name="user_surname" placeholder="Surname" value="<?php echo $data['user_surname'] ?>" /></td>

            </tr>

            <tr>

                <th>E-mail</th>

                <td><input type="text" name="user_email" placeholder="E-mail" value="<?php echo $data['user_email'] ?>" /></td>

            </tr>
            <tr>

                <th>Password</th>

                <td><input type="text" name="user_pass" placeholder="Password" value="<?php echo $data['user_pass'] ?>" /></td>

            </tr>


            <tr>

                <input type="hidden" name="id" value="<?php echo $data['id']?>" />

                <td><button type="submit">Save Changes</button></td>

                <td><a href="index.php"><button type="button">Back</button></a></td>

            </tr>

        </table>

    </form>

 

</fieldset>

 

</body>

</html>

 

<?php

}

?>