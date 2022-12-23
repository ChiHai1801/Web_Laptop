<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$date = date_create($_POST["created_at"]);
$date = date_create($_POST["updated_at"]);

$sql = "INSERT INTO users (name, email, password, created_at, updated_at) 
	VALUES ('".$_POST["name"] ."', '".$_POST["email"] ."','".md5($_POST["password"])."', '".$date ->format('Y-m-d') ."', '".$date ->format('Y-m-d') ."' )";

if ($conn->query($sql) == TRUE) {
  echo "Dang ky thanh cong!!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>