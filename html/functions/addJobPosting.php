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

        // formatted variables
        $updatedRole = mysqli_real_escape_string($conn, $role);
        $updatedCompany = mysqli_real_escape_string($conn, $company);
        $updatedDate = mysqli_real_escape_string($conn, $date_applied);
        $updatedURL = mysqli_real_escape_string($conn, $job_link);

        // SQL query that adds job posting to database
        $sql = "INSERT INTO job_postings (email, role, company, status, date_applied, job_link) VALUES ('$email', '$updatedRole', '$updatedCompany', '$status', '$updatedDate', '$updatedURL')";
        $results = mysqli_query($conn, $sql);
        echo "<script>
                    alert('You have successfully posted a job opening');
                    window.location.href='../dashboard/recruiterDashboard.php';
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