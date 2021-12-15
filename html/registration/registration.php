<?php
    if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repassword"]) && isset($_POST["role"]) && isset($_POST["phone"])) {
        if ($_POST["first_name"] && $_POST["last_name"] && $_POST["password"] && $_POST["repassword"] && $_POST["email"] && $_POST["role"] && $_POST["phone"]) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $repassword = $_POST["repassword"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $role = $_POST["role"];
            $phone = $_POST["phone"];

            if ($password === $repassword) {
                // create connection
                $conn = mysqli_connect("localhost", "root", "", "harmony");

                // check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // register user
                $sql = "INSERT INTO student_db (first_name, last_name, email, password, role, phone) VALUES     
                    ('$first_name', '$last_name', '$email', '$password', '$role', '$phone')";

                $results = mysqli_query($conn, $sql);

                if ($results) {
                    echo "<script>
                        alert('SUCCESS! Your account has been successfully created.');
                    </script>";
                    echo '<script>window.location.href="../registration-signin.html";</script>';
                } else {
                    echo '<div class = "failure">Failed to Register. Please enter a different username.</div>';
                }

                mysqli_close($conn); // close connection

            } else {
                echo '<div class = "failure">Failed to Register: Make sure your passwords match.</div>';
            }
        } else {
            echo '<div class = "failure">Failed to Register: Make sure all fields are filled.</div>';
        }
    } else {
        echo '<div class = "instructions">Register Here</div>';
    }
