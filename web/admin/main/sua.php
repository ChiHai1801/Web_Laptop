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

$id =  $_POST['id'];
$date = date_create($_POST["created_at"]);
$date = date_create($_POST["updated_at"]);
	  
$sql = "UPDATE users set Name = '".$_POST['name']."',
                                  email = '".$_POST['email']."',
                                  password = '".md5($_POST["password"])."',
                                  phone = '".$_POST['phone']."',
                                  created_at = '".$date ->format('Y-m-d')."',
                                  updated_at = '".$date ->format('Y-m-d')."'";
$sql = $sql. " WHERE ID='".$id."'";


if ($conn->query($sql) == TRUE) {
  header('Location: dstv.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>