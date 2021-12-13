<?php
  // Start the user session
  session_start();
?>
<?php
    if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["phone"]) ) {
            $firstname = $_POST["fname"];
            $lastname = $_POST["lname"];
            //$email = $_POST["email"]);
            $phone = $_POST["phone"];

            // gets session email variable from login page
            $email = $_SESSION["email"];

            // create connection
            $conn = mysqli_connect("localhost", "root", "", "harmony");

            // check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "UPDATE student_db SET first_name ='$firstname', last_name = '$lastname', phone = '$phone' WHERE email='$email'";
            $results = mysqli_query($conn, $sql);
            echo "<script>
                alert('You have successfully edited your application');
                window.location.href='../dashboard/dashboard.php';
                </script>";

            // close connection
            mysqli_close($conn);
    } else {
        echo $email;
        echo $lname;
        echo $fname;
        echo $phone;
        echo "Failed to update account";
    }
?>
