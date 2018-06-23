<?php require_once 'actions/db_connect.php'; ?>

 

<!DOCTYPE html>

<html>

<head>

    <title>PHP CRUD</title>

 

    <style type="text/css">

        .manageUser {

            width: 50%;

            margin: auto;

        }

 

        table {

            width: 100%;

            margin-top: 20px;

        }

 

    </style>

 

</head>

<body>

 

<div class="manageUser">

    <a href="create.php"><button type="button">Add User</button></a>

    <table border="1" cellspacing="0" cellpadding="0">

        <thead>

            <tr>

                <th>Name</th>

                <th>Email</th>

                <th>Option</th>

                <th>wasauchimmer</th>

            </tr>

        </thead>

        <tbody>


            <?php

            $sql = "SELECT img, title FROM media";
            $result = mysqli_query($conn, $sql);
            // fetch a next row (as long as there are some) into $row
            while($row = mysqli_fetch_assoc($result)) {
            printf("%s <br>", $row["img"], ."<br>".$row["title"])
            }



            $sql = "SELECT * FROM users WHERE active = 0";

            $result = $connect->query($sql);

 

            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    echo "<tr>

                        <td>".$row['user_first_name']." ".$row['user_surname']."</td>

                        <td>".$row['user_email']."</td>

                        <td>

                            <a href='update.php?id=".$row['id']."'><button type='button'>Edit</button></a>

                            <a href='delete.php?id=".$row['id']."'><button type='button'>Delete</button></a>

                        </td>

                    </tr>";

                }

            } else {

                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

            }

            ?>


             

        </tbody>

    </table>

</div>

 

</body>

</html>