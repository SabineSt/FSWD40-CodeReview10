<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>tryout</title>

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
	   <?php
        $servername = "localhost";
        $username   = "root";
        $password   = ""; 
        $dbname     = "cr10_sabine_steiger_biglibrary";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error() . "\n");
         } ?>

       <div class="manageUser">

       <table border="1" cellspacing="0" cellpadding="0">

            <thead>
            <tr>
                <th>Title</th>
                <th>Book</th>
            </tr>

            </thead>

            <tbody>

                 <?php
                 $sql = "SELECT img, title FROM media";
                 $result = mysqli_query($conn, $sql);

                 while($row = mysqli_fetch_assoc($result)) {
                 printf("%s %s<br>","<img src='" . $row["img"] . "'>", "<br>".$row["title"]);
                 	// echo "<tr>
                 	//          <td>".$row['title']."</td>
                 	//          <td>".<img src='" . $row['img']."'>"</td>                 	     
                	 //      </tr>";
                 }

                 mysqli_free_result($result);
                 mysqli_close($conn);
                 ?>
            </tbody>

            <a href="create.php"><button type="button">Add User</button></a>

        </table>

        </div>

 </body>

</html>

