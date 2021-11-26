<?php
    $dsn = sprintf(
        'mysql:dbname=%s;unix_socket=%s/%s',
        $dbName,
        $socketDir,
        $connectionName
    );

    // Connect to the database.
    $conn = new PDO($dsn, $username, $password, $conn_config);
?>

<?php 
    $servername = "database-instance"; $username = "root"; $password = ""; 
    // Create connection 
    $conn = new mysqli($servername, $username, $password); 
    // Check connection 
    if ($conn->connect_error) { 
        die("Connection failed: ".$conn->connect_error);
    } 
    echo "Connected successfully"; 
?>