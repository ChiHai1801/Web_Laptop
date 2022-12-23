<?php
include('../../layouts/header.php');
include('../../Model/laptops.php');
include('../../Model/gia.php');

$laptop = new Laptop();
$listlaptop = $laptop->getAllnoLimit();

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

    if (isset($_POST['giaht'])) {
        $gia = new Gia();
            $count = $gia->insert($_POST);
            $_SESSION['success'] = 'Thêm thành công';
    }

?>

<body>


    <div class="main_container">
        <?php
        if (isset($_SESSION['success'])) {
        ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $_SESSION['success'] ?>
            </div>
        <?php
        }
        ?>
        <form method="post" class="form" enctype="multipart/form-data">

                        
            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Giá:</label>
                <div class="col-sm-10">
                    <input type="number" name="giaht"  required>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Ngày</label>
                <div class="col-sm-10">
                    <input type="date" name="ngayht"  required>
                </div>
            </li>


            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>