<?php
    session_start();
?>

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

                                            if($row["role"] == "student") {
                                                header('Location: ../dashboard/dashboard.php');      
                                            } else {
                                                header('Location: ../dashboard/recruiterDashboard.php');      
                                            }
                                        } else {          
                                            echo '<script language="javascript">';
                                            echo 'alert("Password incorrect");';
                                            echo 'window.location = "../registration-signin.html";';
                                            echo '</script>';      
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
          