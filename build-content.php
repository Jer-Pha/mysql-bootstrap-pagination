<?php include('db-connect.php');

// This will generate the total number of rows for pagination.js

$table_length = 0;

// The following query needs to match the query running in populate-content.php without the LIMIT and ORDER BY statements 
$query = "SELECT COUNT(*) FROM `shows`";
$result = mysqli_query($conn, $query);

$table_length = mysqli_fetch_row($result)[0];

mysqli_free_result($result);

$conn->close();

//EOF
