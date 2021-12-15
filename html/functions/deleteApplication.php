<?php
// Start the user session
session_start();
?>
        
<?php
if (isset($_POST["application_id"])) {
    if ($_POST["application_id"]) {

        $application_id = $_POST["application_id"];

        // gets session email variable from login page
        $email = $_SESSION["email"];

        // create connection
        $conn = mysqli_connect("localhost", "root", "", "harmony");

        // check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // SQL query that deletes an application from the database
        $sql = "DELETE FROM applications WHERE application_id='$application_id'";
        $results = mysqli_query($conn, $sql);
        echo "<script>
                alert('You have successfully deleted your application');
                window.location.href='../dashboard/dashboard.php';
                </script>";

        // close connection
        mysqli_close($conn);
    } else {
        echo "<script>
                    alert('Please enter a valid account name');
                    window.location.href='../dashboard/dashboard.php';
                    </script>";
    }
} else {
    echo "Failed to create account";
}
?>