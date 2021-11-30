<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="flashcard.png" />
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php 
    include 'php/process.php';
    session_start();
    
    $id = $_SESSION["applicationid"];
    $sql = "SELECT * FROM application WHERE applicationid = $id";
    $result = mysqli_query($conn, $sql);
    $application = mysqli_fetch_assoc($result);

    echo nl2br(htmlspecialchars($application['applicationid']));
    echo "<br />";
    echo nl2br(htmlspecialchars($application['companyname']));
    echo "<br />";
    echo htmlspecialchars($application['position']);
    echo "<br />";
    echo htmlspecialchars($application['type']);
    echo "<br />";
    echo htmlspecialchars($application['status']);


    


?>

</body>
</html>