<?php
    session_start();
?>
<html>  
    <header>    
        <link rel="stylesheet" href="login.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <title>Login/Registration</title>  
    </header>  
    <body class= "background-color"> 
        <div class="grid-container">
            <div class="login-half">
                <div class= "center"> 
                    <h1 className = "bank-name">Login to your Harmony Account</h1>
                    <!-- <img src="SJSUlogo.jpg" width="110px" height="auto"/> -->
                </div>  
                <div class="title">
                    <h3>Login Here</h3> 
                    <?php
                        $logged_in = false;  
                        if (isset($_POST["email"]) && isset($_POST["password"])) {    
                            if ($_POST["email"] && $_POST["password"]) {      
                                $email = $_POST["email"];      
                                $password = $_POST["password"];      

                                // create connection       
                                $conn = mysqli_connect("localhost", "root", "", "harmony");   

                                // check connection      
                                if (!$conn) {        
                                    die("Connection failed: " . mysqli_connect_error());     
                                }  

                                // select user      
                                $sql = "SELECT * FROM student_db WHERE email = '$email'";   

                                $results = mysqli_query($conn, $sql);   

                                if ($results) {  
                                    $row = mysqli_fetch_assoc($results); 

                                    // check to make sure the username exists before grabbing password
                                    if(isset($row["password"])) {    
                                        if ($row["password"] === $password && $row["email"] === $email) {          
                                            $logged_in = true;  
                                            $_SESSION['email'] = $email;
                                            header('Location: ../dashboard/dashboard.php');      
                                        } else {          
                                            echo '<div class="alert alert-danger">
                                                <strong>Failed!</strong> Password or email is incorrect. Please try again!
                                            </div>';        
                                        } 
                                    } else {
                                        echo '<div class="alert alert-danger">
                                                <strong>Failed!</strong> Email not found. Please try again!
                                              </div>';
                                    }   
                                } else {        
                                    echo '<div class="alert alert-danger">
                                                <strong>Failed!</strong> Password is incorrect. Please try again!
                                         </div>';
                                }      
            
                                mysqli_close($conn); // close connection    
            
                            } else {     
                                echo '<div class="alert alert-danger">
                                                <strong>Failed!</strong> Make sure you filled in the form!
                                    </div>';   
                            }  
                        }
                    ?>  
                </div>   
         
                <form action="login.php" method="post">   
                    <div class ="inputGroup">
                        <label for="email">Email: </label>
                        <input type = "email" placeholder=" Enter your email" name = "email" label = "email" required> 
                    </div>
                    <div class="inputGroup">
                        <label for="password">Password: </label>
                        <input type = "password" placeholder =" Enter your password" name = "password" required>
                    </div>
                    <div class='btnPadding'>
                        <input class="btnLogin" type = "submit" value = "Login">  
                    </div>  
                </form>
        
                <div class = "center">
                    <h4>Don't have an account? Register Below!</h4>
                    <button class="btn"><a href="registration.php">Register Here</a></button>   
                </div>

            </div>  
        </div>
    </body> 
</html>