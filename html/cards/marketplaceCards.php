<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">

  </head>
  <body>
    <div class="container"> 
      <div class="row"> 
          <?php
            $conn = mysqli_connect('localhost', 'root', '', 'harmony');
            if(!$conn)
            {
                die("Connection Failed: " . mysqli_connect_error());
            }
            $query = "SELECT * FROM job_postings WHERE status = 'Open'";
            $results = mysqli_query($conn, $query);

            function function_alert($message) {
      
                // Display the alert box 
                echo "<script>alert('$message');</script>";
            }
              
            if($results)
            {
              while($row = $results->fetch_assoc())
              {
                if($row['status'] == "Open") {
                  echo "<div class='card text-white bg-success m-3' style='max-width: 20rem;'>
                          <div class='card-body'>
                          <h5 id='card-role' class='header text-center'>$row[role]</h5>
                          <h6 class='card-subtitle mb-2'>Status: $row[status]</h5>
                          <h4>Company: $row[company] </h4>
                          <a href='$row[job_link]' target='_blank' class='card-link'>Job Description link</a>
                          </div>
                          <div class='card-footer'>Date Applied: $row[date_applied]</div>
                      </div>";
                }
                if($row['status'] == "Closed") {
                  echo "<div class='card text-white bg-danger m-3' style='max-width: 20rem;'>
                          <div class='card-body'>
                          <h5 id='card-role' class='header text-center'>$row[role]</h5>
                          <h6 class='card-subtitle mb-2'>Status: $row[status]</h5>
                          <h4>Company: $row[company] </h4>
                          <a href='$row[job_link]' target='_blank' class='card-link'>Job Description link</a>
                          </div>
                          <div class='card-footer'>Date Applied: $row[date_applied]</div>
                      </div>";
                }
              }
            } else {
              echo "
                      <h1> NO applications </h1>
                   ";
            }
          ?>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

  </body>
</html>