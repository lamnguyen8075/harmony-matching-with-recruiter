<?php

// Database connection
include 'local-connect.php';

// ADD NEW CARD
    if(isset($_POST['add-card'])){
          $companyname = $_POST["companyname"];
          $position = $_POST["position"];
          $type = "added";
          $status = $_POST["status"];
          $date = $_POST["date"];
        

          // register user
          $sql = "INSERT INTO application (companyname,position,type,status,date)
          VALUES ('$companyname','$position','$type','$status','$date')";

          $results = mysqli_query($conn, $sql);
          if ($results) {
            //echo "The user has been added.";
            echo "  <script>
                        alert('Card Added!');
                        window.location.href='login.php';
                    </script>";
          } else {
             echo mysqli_error($conn);
           }
    }

    // DISPLAY CARD
    $sql = "SELECT * FROM `application`;";
    $resultCardManuallyAdded = mysqli_query($conn, $sql);
    $countCardManuallyAdded = mysqli_num_rows($resultCardManuallyAdded);
  

?>