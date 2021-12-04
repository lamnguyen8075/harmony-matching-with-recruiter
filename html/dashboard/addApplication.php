<?php
  // Start the user session
  session_start();
?>
        
<?php
    if (isset($_POST["role"]) && isset($_POST["company"]) && isset($_POST["status"]) && isset($_POST["date_applied"])) {
        if ($_POST["role"] && $_POST["company"] && $_POST["status"] && $_POST["date_applied"] && $_POST["job_link"]) {
            
            $role = $_POST["role"];
            $company = $_POST["company"];
            $status = $_POST["status"];
            $date_applied = $_POST["date_applied"];
            $job_link = $_POST["job_link"];
            
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
                $updatedRole = mysqli_real_escape_string($conn, $role);
                $updatedCompany = mysqli_real_escape_string($conn, $company);
                $updatedDate = mysqli_real_escape_string($conn, $date_applied);
                $updatedURL = mysqli_real_escape_string($conn, $job_link);

                $sql = "INSERT INTO applications (email, role, company, status, date_applied, job_link) VALUES ('$email', '$updatedRole', '$updatedCompany', '$status', '$updatedDate', '$updatedURL')";
                $results = mysqli_query($conn, $sql);
                echo "<script>
                    alert('You have successfully saved an application');
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