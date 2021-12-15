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
    <title>Job Marketplace</title>

</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-blue">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Job Marketplace <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <!-- <button type="button" class="btn btn-danger" action="logout.php">Logout</button> -->
            <a id="logout-btn" class="btn btn-danger" href="logout.php" role="button">Logout</a>

        </div>
    </nav>

    <h1 class='display-4' id='welcome-message'>Job Marketplace</h1>

    <!-- Displays cards contained with all of the job postings recruiters posted-->
    <?php include '../cards/marketplaceCards.php'; ?>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="depositCheck.js"></script>
</body>

</html>