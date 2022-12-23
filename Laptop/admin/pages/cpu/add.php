<?php
include('../../layouts/header.php');
include('../../Model/cpu.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
if (isset($_POST['cpuName'])) {
    $cpu = new Cpu();
        $count = $cpu->insert($_POST);
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
        <?php } ?>
        <form method="post" class="form" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên CPU:</label>
                <div class="col-sm-10">
                    <input type="text" name="cpuName" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Số nhân:</label>
                <div class="col-sm-10">
                    <input type="text" name="cpusonhan" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Số luồng:</label>
                <div class="col-sm-10">
                    <input type="text" name="cpusoluong" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tốc độ CPU:</label>
                <div class="col-sm-10">
                    <input type="text" name="cputocdocpu" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tốc độ tối đa:</label>
                <div class="col-sm-10">
                    <input type="text" name="cputocdotoida" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Bộ nhớ đệm:</label>
                <div class="col-sm-10">
                    <input type="text" name="cpubonhodem" required>
                </div>
            </div>
                     
            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>