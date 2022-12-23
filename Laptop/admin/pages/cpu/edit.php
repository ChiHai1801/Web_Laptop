<?php
include('../../layouts/header.php');
include('../../Model/cpu.php');
$cpu = new Cpu();

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $cpu->getCpuById($id);
    } else {
        header('Location:index.php');
    }
}
if (isset($_POST['cpu_id'])) {
    $id = $_POST['cpu_id'];
    $count = $cpu->update($_POST);
    $_SESSION['success'] = "Sua thanh cong " . 'san pham';
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
        <?php } ?>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" name="cpu_id" value="<?php echo $obj['cpu_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên CPU:</label>
                <div class="col-sm-10">
                    <input type="text" name="cpuName" value="<?php echo $obj['cpu_name'] ?>" >
                </div>
            </div>

            <div class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Số nhân:</label>
               <div class="col-sm-10">
                   <input type="text" name="cpusonhan" value="<?php echo $obj['cpu_sonhan'] ?>" >
               </div>
           </div>

           <div class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Số luồng:</label>
               <div class="col-sm-10">
                   <input type="text" name="cpusoluong" value="<?php echo $obj['cpu_soluong'] ?>" >
               </div>
           </div>

           <div class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Tốc độ CPU:</label>
               <div class="col-sm-10">
                   <input type="text" name="cputocdocpu" value="<?php echo $obj['cpu_tocdocpu'] ?>" >
               </div>
           </div>

           <div class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Tốc độ tối đa:</label>
               <div class="col-sm-10">
                   <input type="text" name="cputocdotoida" value="<?php echo $obj['cpu_tocdotoida'] ?>" >
               </div>
           </div>

           <div class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Bộ nhớ đệm:</label>
               <div class="col-sm-10">
                   <input type="text" name="cpubonhodem" value="<?php echo $obj['cpu_bonhodem'] ?>" >
               </div>
           </div>

            <input type="submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>