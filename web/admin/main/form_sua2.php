<!DOCTYPE HTML>
<html>  
    <head>
          <link rel="stylesheet"  href="thanhvien.css">
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
$sql = "select * FROM product WHERE ID='".$id."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<body>
<main class="main" >
            <div class="table">
                <h1 class="form_title">Sửa Sản Phẩm</h1>

                <form action="sua2.php" method="post" class="register"> 

                <div class="form-row">
                <lable>ID:</lable>
                <input type="text" name="id" value="<?php echo $row['id'];?>">
                </div> 

                <div class="form-row">
                <lable>Name:</lable>
                <input type="text" name="name" value="<?php echo $row['name'];?>">
                </div> 

                <div class="form-row">
                <lable>Price:</lable>
                <input type="number" name="tien"  value="<?php echo $row['price'];?>">
                </div> 

                <div class="form-row">
                <lable>Content:</lable>
                <input type="text" name="content" value="<?php echo $row['content'];?>">
                </div> 

                <div>
                <lable>Image:</lable>
                <input type="file" name="fileToUpload" class="fileToUpload" id="fileToUpload"  value="<?php echo $row['image_link'];?>">
                </div> 


                <div class="form__submit">
                    <input class="submit" type="submit">
                </div>
</form>
</div>
</main>

</body>
</html>
          