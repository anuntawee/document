<?php
$servername = "10.1.1.127:3306";  // Change to your server name
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "projectscg";   // Change to your database name

// Create a connection
$con = new mysqli($servername, $username, $password, $dbname);
$con->set_charset("utf8");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    echo "Connection Succres";
}

?>
