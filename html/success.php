<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success page</title>
</head>
<body>
    <h1>
        Success!
    </h1>

    <?php
         $conn = mysqli_connect('localhost', 'root', '', 'harmony');
         if(!$conn)
         {
             die("Connection Failed: " . mysqli_connect_error());
         }
         $query = "SELECT * FROM student_db WHERE email = \"" . $_SESSION['email'] . "\"";
         $results = mysqli_query($conn, $query);
   
         if($results)
         {
           while($row = $results->fetch_assoc())
           {
             echo "<h1>Welcome, $row[first_name]!</h1>";
           }
         }
    ?>
    <div class="center">
        <button class="btn"><a href="registration-signin.html">Registration Page</a></button>
    </div>

    <div class="center">
        <button class="btn"><a href="logout.php">Logout</a></button>
    </div>
</body>
</html>