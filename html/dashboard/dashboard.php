<?php
  // Start the session
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>

  </head>
  <body>
    <nav class="navbar navbar-expand navbar-dark bg-blue">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#addApplicationModal">Add Application</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#editApplicationModal">Edit Application</a>
          </li>
        </ul>
        <!-- <button type="button" class="btn btn-danger" action="logout.php">Logout</button> -->
        <a id="logout-btn" class="btn btn-danger" href="logout.php" role="button">Logout</a>

      </div>
    </nav>

    <!-- Pulls user's full name -->
    <?php
      $conn = mysqli_connect('localhost', 'root', '', 'harmony');
      if(!$conn)
      {
          die("Connection Failed: " . mysqli_connect_error());
      }
      $query = "SELECT * FROM student_db WHERE email = \"" . $_SESSION['email'] . "\"";
      $results = mysqli_query($conn, $query);

      if($results)
      {
        while($row = $results->fetch_assoc())
        {
          echo "<h1 class='display-4' id='welcome-message'>Welcome, $row[first_name]!</h1>";
        }
      }
    ?> 

    <!-- Displays cards contained with all of the user's job applications-->
    <?php include 'applicationCards.php'; ?>

    <!-- Modal for Add Account-->
    <div class="modal fade" id="addApplicationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Application</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    
          <!-- Forms -->
          <form action="addApplication.php" method="post">
            <div class="inputBox">
              <label class="inputLabel">Role</label>
              <input type="text" class="form-control" name="role" aria-describedby="emailHelp" placeholder="Sofware Engineer, Front-end Engineer, etc." required>
            </div>
            <div class="inputBox">
              <label class="inputLabel">Company</label>
              <input type="text" class="form-control" name="company" aria-describedby="emailHelp" placeholder="Google, Facebook, etc." required>
            </div>
            <!-- Dropdown for application status -->
            <div class="inputBox"> 
              <label id='accountType' class="my-1 mr-2" for="inlineFormCustomSelectPref">Status</label>
                <select name="status" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required>
                  <option value="Applied">Applied</option>
                  <option value="Review">Review</option>
                  <option value="Interview">Interview</option>
                  <option value="Offer">Offer</option>
                  <option value="Rejected">Rejected</option>
                  <option value="Withdraw">Withdraw</option>
              </select>
            </div>
            <div class="inputBox">
              <label class="inputLabel">Date</label>
              <input type="text" class="form-control" name="date_applied" aria-describedby="emailHelp" required>
            </div>
              <button type="submit" id="addAccountSubmitBtn" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal for edit application -->
    <div class="modal fade" id="editApplicationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Application</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    
          <!-- Forms -->
        <form action="editApplication.php" method="post">
        <!-- Dropdown for user's tracked applications -->

            <div class="inputBox">
                <label for="application">Select the Application You Want to Edit</label><br>
                <select id="application_id" name="application_id" label="application_id" required>
                <?php 
                    $conn = mysqli_connect("localhost", "root", "", "harmony");
                    $query = "SELECT * FROM applications WHERE email = \"" . $_SESSION['email'] . "\"";
                    $query_run = mysqli_query($conn, $query);
        
                    if(mysqli_num_rows($query_run) > 0)
                    {
                    foreach($query_run as $row)
                    {
                ?>
                        <option value=<?= $row['application_id']; ?>> <?= $row['application_id']; ?>: <?= $row['company']; ?> - <?= $row['role']; ?></option>
                <?php
                    }
                    }
                    else
                    {
                    ?>
                    <font color="E60000">
                    <?php
                        echo "<b>*** No Applications Found ***</b>";
                        ?>
                    </font>
                    <?php
                    }
                ?>
                </select>
            </div>

            <div class="inputBox"> 
              <label id='accountType' class="my-1 mr-2" for="inlineFormCustomSelectPref">Status</label>
                <select name="status" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required>
                  <option value="Applied">Applied</option>
                  <option value="Review">Review</option>
                  <option value="Interview">Interview</option>
                  <option value="Offer">Offer</option>
                  <option value="Rejected">Rejected</option>
                  <option value="Withdraw">Withdraw</option>
              </select>
            </div>

            <button type="submit" id="addAccountSubmitBtn" class="btn btn-primary">Submit</button>

        </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="depositCheck.js"></script>
  </body>
</html>