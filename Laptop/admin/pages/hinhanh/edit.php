<?php
include('../../lib/upload.php');
include('../../layouts/header.php');
include('../../Model/hinhanh.php');
include('../../Model/gia.php');
include('../../Model/laptops.php');
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$gia = new Gia();
$listgia  =  $gia->getAllNoLimit();

$hinhanh = new Hinhanh();
$laptop = new Laptop();
$listlaptop =  $laptop->getAllNoLimit();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $hinhanh->gethinhanhById($id);
    } else {
        header('Location: ../index.php');
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $realpath = $obj['img'];
    $upload = new upload();
    if (isset($_FILES['file']) && $_FILES['file']['name']!='') {
        //   echo "aaa";
           //xoa file cu
           if (file_exists('uploads/' . $realpath)) {
               try {
                   unlink('uploads/' . $realpath);
               } catch (Exception $e) {
                   echo $e->getMessage();
               }
           }
           // up file moi
           $upload = new upload();
           $upload->upload();
           $realpath = $upload->getRealpath();
           $_POST['file'] = $realpath; //getRealpath -> file name
           $brand->update($_POST);
       } else { //nen k co anh dc uploads thi lays nah cu chen vao db
           $_POST['file'] = $realpath;
           $brand->update($_POST);
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
        <?php
        }
        ?>
        <form method="post" enctype="multipart/form-data">

        <li class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
                <div class="col-sm-10">
                    <select name="lt_id">
       
                    <?php foreach ($listlaptop as $laptop) {
                     ?>
                        <option <?php if($laptop['lt_id'] == $obj['lt_id']) echo 'selected'; ?> value="<?php echo $laptop['lt_id'] ?>"><?php echo $laptop['lt_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </li>

        <input type="hidden" name="oc_id" value="<?php echo $obj['ha_id'] ?>" required />
            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Hình ảnh:</label>
                <div class="col-sm-10">
                    <img height="100px" width="120px" src="<?php echo './uploads/' . $obj['img'];  ?>" alt="">
                    <input type="file" name="file">
                </div>
            </li>


            <li class="form-group row">
           <label for="staticEmail" class="col-sm-2 col-form-label">Giá:</label>
               <div class="col-sm-10">
                   <select name="lt_id">
      
                   <?php foreach ($listgia as $gia) {
                    ?>
                       <option <?php if($gia['gia_id'] == $obj['gia_id']) echo 'selected'; ?> value="<?php echo $gia['gia_id'] ?>"><?php echo $gia['gia'] ?></option>
                   <?php } ?>
               </select>
           </div>
       </li>

            <input type="submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>