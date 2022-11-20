<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../Public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../Public/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/tables.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
      </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
     </script>
</head>

<body>
    <div class="wrapper">
           <!-- Navbar -->
           <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/lap1/admin/pages/laptop" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="http://localhost/lap1/admin/pages/sanpham/add.php" class="nav-link">Contact</a>
                </li>

                <li class="nav-item logout">
                    <a class="nav-link " href="?logout=true">
                        Logout
                    </a>
                </li>
            
            </ul>
  
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <!-- <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"> -->
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" >

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class 
                             with font-awesome or any other icon font library --> 
                     <a href="#" class="brand-link">
                          <img src="../../../faicon.jpg" width="50px" height="70px" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                         <span class="brand-text font-weight-light">Admin</span>
                     </a>

                        <li class="nav-item has-treeview">
                            <a href="http://localhost/lap1/admin/pages/laptop" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                Trang chủ
                            </a>
                        </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i> laptop
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/laptop/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/laptop">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i> Sản Phẩm
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/sanpham/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/sanpham">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Thương Hiệu
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/thuonghieu/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/thuonghieu">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Người Dùng
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/users/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/users">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Chi tiết sản phẩm
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/chitietsp/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/chitietsp">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Giá
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/gia/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/gia">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i> CPU
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/cpu/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/cpu">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  RAM
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/ram/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/ram">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Ổ cứng
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/ocung/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/ocung">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Nhu Cầu
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/nhucau/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/nhucau">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>   Hình ảnh
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/hinhanh/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/hinhanh">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Màn Hình
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/manhinh/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/manhinh">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Màu Máy
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/maumay/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/maumay">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Trọng Lượng
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/trongluong/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/trongluong">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Độ Phân Giải
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/dophangiai/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/dophangiai">Xem</a>
                              </ul>
                          </li>

                          <li class="nav-item has-treeview">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                              <i class="nav-icon fas fa-copy"></i>  Tầng Số Quét
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/tangsoquet/add.php">Thêm</a>
                                  <a class="dropdown-item" href="http://localhost/lap1/admin/pages/tangsoquet">Xem</a>
                              </ul>
                          </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
</body>
</html>