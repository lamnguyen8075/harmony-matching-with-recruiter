<?php
  // Start the user session
  session_start();
?>
        
<?php
    if (isset($_POST["application_id"]) && isset($_POST["status"])) {
        if ($_POST["application_id"] && $_POST["status"]) {

            $status = $_POST["status"];
            $application_id = $_POST["application_id"];
            
            // gets session username variable from login page
            $email = $_SESSION["email"];

            // create connection
            $conn = mysqli_connect("localhost", "root", "", "harmony");

            // check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // pull all of user's accounts
            // $pullAccounts = "SELECT * FROM accounts WHERE active = 1 && username = \"" . $_SESSION['username'] . "\"";
            // $accounts = mysqli_query($conn, $pullAccounts);
            // $rowCount=mysqli_num_rows($accounts);

            // checks if the user has created 5 accounts already
            // if ($rowCount < 5) {
                // add account

                $sql = "UPDATE applications SET status='$status' WHERE application_id='$application_id'";
                $results = mysqli_query($conn, $sql);
                echo "<script>
                    alert('You have successfully edited your application');
                    window.location.href='dashboard.php';
                    </script>";
            // } else {
            //     echo "<script>
            //         alert('You have reached the maximum amount of accounts you can create');
            //         window.location.href='UserHomePage.php';
            //         </script>";
            //     echo mysqli_error($conn);
            // }

            // close connection
            mysqli_close($conn);

        } else {
            echo "<script>
                    alert('Please enter a valid account name');
                    window.location.href='dashboard.php';
                    </script>";
        }
    } else {
        echo "Failed to create account";
    }
?>