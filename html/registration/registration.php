<!-- <html> -->
<!-- <head> -->
    <!-- <link rel="stylesheet" href="registrationPG.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <title>Registration Page</title> -->
<!-- </head> -->

<!-- <body> -->
    <!-- <div>
        <div class="center"> 
            <h1 class="bank-title">Harmony Registration Page</h1>
        </div> -->
        <?php 
        if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repassword"]) && isset($_POST["role"]) && isset($_POST["phone"])){
            if ($_POST["first_name"] && $_POST["last_name"] && $_POST["password"] && $_POST["repassword"] && $_POST["email"] && $_POST["role"] && $_POST["phone"]) {
                $first_name = $_POST["first_name"];
                $last_name = $_POST["last_name"];
                $repassword = $_POST["repassword"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $role = $_POST["role"];
                $phone = $_POST["phone"];

                if ($password === $repassword){
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
                        echo '<script>window.location.href="success.html";</script>';
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
        ?>
    <!-- </div> -->
    <!-- <form action="registration.php" method="post">
        <section>   
            <div>
                <label for="first_name">First Name: </label>
                <input type = "text" placeholder="Enter Your First Name" name= "first_name" label = "first_name" required>
            </div>
            <div>
                <label for="last_name">Last Name: </label>
                <input type = "text" placeholder="Enter your Last Name" name = "last_name" label = "last_name" required>
            </div>
        </section>
        <section>
            <div>
                <label for="password">Email: </label>
                <input type = "email" placeholder="Enter your email" name = "email" label = "email" required>
            </div>
            <div>
                <label for="password">Password: </label>
                <input type = "password" placeholder="Enter your Password" name = "password" label = "password" required>
            </div>
            <div>
                <label for="repassword">Re-enter Password: </label>
                <input type = "password" placeholder="Re-enter Password" name = "repassword" label = "repassword" required>
            </div>
        </section>

        <section>
            <div>
                <label for="role">Role: </label>
                <select id="role" name="role" required>
                    <option value="student">student</option>
                    <option value="recruiter">recruiter</option>
                </select>
            </div>
            <div>
                <label for="phone">Phone number: </label>
                <input type="text" placeholder="123-456-7890" name="phone" required>
            </div>
        </section>

        <div>
            <input type ="submit" value ="Submit Registration">
        </div>
    </form> -->

    <!-- <div class="center">
        <h3>Did you want to login instead? Click the button below.</h3>
        <button class="btn"><a href="login.php">Login Page</a></button>
    </div>
</body>
</html> -->