<!DOCTYPE HTML>
<html>  
    <head>
        <link rel="stylesheet"  href="../css/thanhvien.css ">
    </head>
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
$sql = "select * FROM users WHERE ID='".$id."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<body>
<main class="main" >
<div class="table">
    <h1 class="form_title">Sửa Bảng Thành Viên</h1>

        <form class="register"ction="sua.php" method="post">

                <div class="form-row">
                <lable>ID:</lable>
                <input type="text" name="id" value="<?php echo $row['id'];?>" >
                </div>
                
                <div class="form-row">
                <lable>Name:</lable>
                <input type="text" name="name" value="<?php echo $row['name'];?>">
                </div>

                <div class="form-row">
                <lable>Phone:</lable>
                <input type="email" name="email"  value="<?php echo $row['email'];?>">
                </div>

                <div class="form-row">
                <lable>Password:</lable>
                <input type="password" name="password"  value="<?php echo $row['password'];?>">
                </div>

                <div class="form-row">
                <lable>Phone:</lable>
                <input type="phone" name="phone"  value="<?php echo $row['phone'];?>">
                </div>
                
                <div class="form-row">
                <lable>created_at:</lable>
                <input type="date" name="created_at"  value="<?php echo $row['created_at'];?>">

                </div>
                <div class="form-row">
                <lable>updated _at:</lable>
                <input type="date" name="updated_at"  value="<?php echo $row['updated_at'];?>">

                </div>
                <div class="form__submit">
                <input class="submit"type="submit">
                </div>
        </form>
        </div>
        </main>
</body>
</html>
