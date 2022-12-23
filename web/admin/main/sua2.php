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
// $date = date_create($_POST["birth"]);
	  
$sql = "UPDATE product set name = '".$_POST['name']."',
                                    price = '".$_POST['tien']."', 
                                    content = '".$_POST['content']."',
                                    image_link = '".$_POST['fileToUpload']."'";
$sql = $sql. " WHERE ID='".$id."'";


if ($conn->query($sql) == TRUE) {
  header('Location: taidulieu_bang.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>