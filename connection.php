<?php
$servername = "http://localhost";
$username = "laravel";
$password = "secret";
$db_name = "tokken";

//create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

//check connection
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
