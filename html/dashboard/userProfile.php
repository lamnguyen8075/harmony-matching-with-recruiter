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
    <link rel="stylesheet" href="style.css">

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
            <a class="nav-link" href="marketplace.php">Job Marketplace</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#addApplicationModal">Add Application</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#editApplicationModal">Edit Application</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#editUserProfile">User Profile</a>
          </li>
        </ul>
        <!-- <button type="button" class="btn btn-danger" action="logout.php">Logout</button> -->
        <a id="logout-btn" class="btn btn-danger" href="logout.php" role="button">Logout</a>

      </div>
    </nav>

    <!-- Displays cards contained with all of the user's job applications-->
    <div class="content">
    <div class="edit-profile-container">
        <div class="title">Edit Profile</div>
        <form action="#">
            <div class="user-info">
                <div class="input-box">
                    <span class="info">First name</span>
                    <input type="text" placeholder="Enter your first name" required>
                </div>
                <div class="input-box">
                    <span class="info">Last name</span>
                    <input type="text" placeholder="Enter your last name" required>
                </div>
                <div class="input-box">
                    <span class="info">Email</span>
                    <input type="text" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="info">Role</span>
                    <select name="role">
                        <option value="applicant">Applicant</option>
                        <option value="recruiter">Recruiter</option>
                    </select>
                </div> 
            </div>
            <div class="resume-box">
                <span class="info">Resume</span>
                <input type="file" name="upload" accept="resume/pdf"/>
            </div>
            <div class="button">
                <input type="submit" value="Save">
                <input type="submit" value="Cancel">
            </div>
        </form>
        
    </div>
  </div>
    <!-- End Edit Profile-->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="depositCheck.js"></script>
  </body>
</html>