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
      // connect to database
      $conn = mysqli_connect('localhost', 'root', '', 'harmony');
      if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
      }

      // selects all the user's applications
      $query = "SELECT * FROM applications WHERE email = \"" . $_SESSION['email'] . "\"";
      $results = mysqli_query($conn, $query);

      function function_alert($message)
      {

        // Display the alert box 
        echo "<script>alert('$message');</script>";
      }

      // formats each of the user's cards depending on their status
      if (mysqli_num_rows($results) != 0) {
        while ($row = $results->fetch_assoc()) {
          if ($row['status'] == "Offer") {
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
          if ($row['status'] == "Rejected" || $row['status'] == "Withdraw") {
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
          if ($row['status'] == "Applied" || $row['status'] == "Review" || $row['status'] == "Interview") {
            echo "<div class='card text-white bg-warning m-3' style='max-width: 20rem;'>
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
                      <h1 id='no-apps-notification'> No applications yet! </h1>
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