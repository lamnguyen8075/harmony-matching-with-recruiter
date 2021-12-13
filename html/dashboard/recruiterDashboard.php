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
    <title>Recruiter Dashboard</title>

  </head>
  <body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#addApplicationModal">Add Job Posting</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#editApplicationModal">Edit Job Posting</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#editUserProfile">User Profile</a>
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
    <?php include '../cards/jobPostingCards.php'; ?>

    <!-- Modal for Add Account-->
    <div class="modal fade" id="addApplicationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Job Posting</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    
          <!-- Forms -->
          <form action="../functions/addJobPosting.php" method="post">
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
                  <option value="Open">Open</option>
                  <option value="Closed">Closed</option>
              </select>
            </div>
            <div class="inputBox">
              <label class="inputLabel">Date</label>
              <input type="text" class="form-control" name="date_applied" aria-describedby="emailHelp" required>
            </div>
            <div class="inputBox">
              <label class="inputLabel">Job Link</label>
              <input type="text" class="form-control" name="job_link" aria-describedby="emailHelp" required>
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
        <form action="../functions/editPosting.php" method="post">
        <!-- Dropdown for user's tracked applications -->

            <div class="inputBox">
                <label for="application">Select the Job Posting You Want to Edit</label><br>
                <select id="application_id" name="application_id" label="application_id" required>
                <?php 
                    $conn = mysqli_connect("localhost", "root", "", "harmony");
                    $query = "SELECT * FROM job_postings WHERE email = \"" . $_SESSION['email'] . "\"";
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
                        echo "<b>*** No Job Postings Found ***</b>";
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
                  <option value="Open">Open</option>
                  <option value="Closed">Closed</option>
              </select>
            </div>

            <div id="edit-buttons">
              <button type="submit" id="submitAppBtn" class="btn btn-primary" name="submit">Submit</button>
              <button type="submit" id="deleteAppBtn" class="btn btn-danger" formaction="../functions/deletePosting.php" formmethod="POST">Delete</button>
            </div>

        </form>
        </div>
      </div>
    </div>


  <!-- Modal for Edit Profile-->
  <div class="modal fade" id="editUserProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php 
            $conn = mysqli_connect("localhost", "root", "", "harmony");
            $query = "SELECT * FROM student_db WHERE email = \"" . $_SESSION['email'] . "\"";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
            foreach($query_run as $row)
            {
          ?>
          <!-- Forms -->
          <form action="../functions/editUserProfile.php" method="post">
            <div class="inputBox">
              <label class="inputLabel">First Name</label>
              <input type="text" class="form-control" name="fname" aria-describedby="emailHelp" placeholder=<?= $row['first_name']; ?> required>
            </div>
            <div class="inputBox">
              <label class="inputLabel">Last Name</label>
              <input type="text" class="form-control" name="lname" aria-describedby="emailHelp" placeholder=<?= $row['last_name']; ?> required>
            </div>
            <div class="inputBox">
              <label class="inputLabel">Email</label>
              <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder=<?= $row['email']; ?> readonly>
            </div>
            <div class="inputBox">
              <label class="inputLabel">Phone Number</label>
              <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder=<?= $row['phone']; ?> required>
            </div>
            <div class="inputBox">
              <label class="inputLabel">Role</label>
              <input type="text" class="form-control" name="role" aria-describedby="emailHelp" placeholder=<?= $row['role']; ?> readonly>
            </div>
              <button type="submit" id="addAccountSubmitBtn" class="btn btn-primary">Save</button>
          </form>
          <?php
               }
              }
          ?>
        </div>
      </div>
    </div>  
    <!-- End Edit Profile-->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="depositCheck.js"></script>
  </body>
</html>