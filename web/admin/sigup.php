<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet"  href="login.css">
        <link rel="stylesheet" href="css/sanpham.css">
    </head>
    <body>
        <main class="main" >
            <div class="table">
                <h1 class="form_title">Đăng Ký</h1>
                
                <form action="xuly.php" method="post" class="register">
                    <div class="form-row">
                        <lable for="name">Name:</lable>
                        <input type="text" id="name" name="name" placeholder="Họ tên. . ." required> 
                        <i class="tick fas fa-check"></i>
                    </div>
                    
                    <div class="form-row">
                        <lable>E-mail:</lable> 
                        <input type="text" name="email" placeholder="Nhập Email" required>
                        <i class="tick fas fa-check"></i>
                    </div>

                    <div class="form-row">
                        <lable>Password:</lable>
                        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
                        <i class="tick fas fa-check"></i>
                    </div>

                    <div class="form-row">
                        <lable>Created At   :</lable>
                        <input type="date" name="created_at">
                        <i class="tick fas fa-check"></i>
                    </div>

                    <div class="form-row">
                        <label>Updated At   :</label>
                        <input type="date" name="updated_at">
                        <i class="tick fas fa-check"></i>
                    </div>

                    <div class="form__submit">
                    <input class="submit" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>
