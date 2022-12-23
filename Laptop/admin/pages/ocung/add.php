<?php
include('../../layouts/header.php');
include('../../Model/ocung.php');
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
if (isset($_POST['ocungName'])) {
    $ocung = new Ocung();
 
        $count = $ocung->insert($_POST);
  
  
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

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên ổ cứng:</label>
                <div class="col-sm-10">
                    <input type="text" name="ocungName" required>
                </div>
            </div>
                     
            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>