<!DOCTYPE HTML>
<html>
    <head>
          <link rel="stylesheet"  href="../css/thanhvien.css">
    </head>
    <body> 
        <main class="main" >
            <div class="table">
                <h1 class="form_title">Thêm Sản Phẩm</h1>
          
                <form action="luu2.php" method="post" class="register">
                    <div class="form-row">
                        <lable for="name">Name:</lable>
                        <input type="text" id="name" name="name" placeholder="Họ tên. . ." required> 
                    </div>
                    
                    <div class="form-row">
                        <lable>Price:</lable>
                        <input type="number" name="tien" min="0" max="200">
                    </div>

                    <div class="form-row">
                        <lable>Content:</lable>
                        <input type="text" name="content">
                    </div>
                    
                    <div>                   
                        <lable>Image_link:</lable>
                        <input type="file" name="fileToUpload" id="fileToUpload" class="fileToUpload">
                    </div>


                    <div class="form__submit">
                        <input class="submit" type="submit" value="Upload Image" name="submit">
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>
