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

$sql = "INSERT INTO users (name, email, password, phone, created_at, updated_at) 
	VALUES ('".$_POST["name"] ."',
   '".$_POST["email"] ."',
   '".md5($_POST["password"])."', 
   '".$_POST["phone"] ."' ,
   '".$date ->format('Y-m-d') ."', 
   '".$date ->format('Y-m-d') ."' )";

if ($conn->query($sql) == TRUE) {
  echo "Thêm Thành Viên Mới Thành Công!!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
