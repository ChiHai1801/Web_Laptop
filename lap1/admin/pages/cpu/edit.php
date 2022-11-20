<?php
require_once('../../layouts/header.php');
require_once('../../Model/cpu.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$cpu = new Cpu();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $cpu->getCpuById($id);
    } else {
        header('Location:index.php');
    }
}
?>

<body>
    <div class="main_containers">
        <?php
        if (isset($_SESSION['success'])) {
        ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $_SESSION['success'] ?>
            </div>
        <?php }?>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" name="cpu_id" value="<?php echo $obj['cpu_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên CPU:</label>
                <div class="col-sm-10">
                    <input type="text" name="cpuName" value="<?php echo $obj['cpu_name'] ?>" >
                </div>
            </div>

            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');

?>