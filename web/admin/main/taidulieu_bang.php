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

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  // trinh bay voi bang html
  //load du lieu moi len dua vao bien result
  $result = $conn->query($sql);
  $result_all = $result -> fetch_all(MYSQLI_ASSOC);
  //print_r($result_all);
  // trinh bay du lieu trong 1 bang html
  //tieu de bang
 ?>

     <head>
        <link rel="stylesheet"  href="../css/thanhvien.css">
    </head>
    <div>
      <h1 class="h1">Bảng Thông Tin Sản Phẩm Mới</h1> 

        <div >
          <a class="form_title1" href="/Admin/View/admin">Thoát</a>
        </div>

          <table border=1>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Content</th>
                  <th>Image</th>
                  <th colspan="2">Action</th>
              </tr>
    </div>


<?php 
 // output data of each row
    foreach ($result_all as $row) {
        echo 
        "<tr><td>" . $row["id"]. 
        "</td><td>" . $row["name"]. 
        "</td><td>" . $row["price"]. 
        "</td><td>" . $row["content"]. 
        "</td><td>" . $row["image_link"]. 
        "</td><td>"
?>
        <form method="post" action="xoa2.php"> 
		<input type="submit" name="action" value="xoa"/>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
<?php
    	echo "</td>";
		echo "<td>";
?>
        <form method="post" action="form_sua2.php"> 
		<input type="submit" name="action" value="sua"/>
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
<?php
    	echo "</td></tr>";
    }
   echo "</table>";
  
} else {
  echo "0 ket qua tra ve";
}
$conn->close();
?>