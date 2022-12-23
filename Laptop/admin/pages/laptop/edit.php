<?php
include('../../layouts/header.php');
include('../../Model/laptops.php');
include('../../Model/thuonghieu.php');
include('../../Model/nhucau.php');
include('../../Model/cpu.php');
include('../../Model/ram.php');
include('../../Model/dophangiai.php');
include('../../Model/ocung.php');
include('../../Model/maumay.php');
include('../../Model/hinhanh.php');
include('../../Model/tangsoquet.php');
include('../../Model/trongluong.php');
include('../../Model/manhinh.php');
include('../../Model/TNdatbiet.php');
include('../../lib/upload.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$laptop = new Laptop();
$listlaptop =  $laptop->getAllNoLimit();

$ram = new Ram();
$listram = $ram->getAllnoLimit();
$cpu = new Cpu();
$listcpu = $cpu->getAllnoLimit();
$nhucau = new Nhucau();
$listnhucau = $nhucau->getAllnoLimit();
$ocung = new Ocung();
$listocung = $ocung->getAllnoLimit();
$manhinh = new Manhinh();
$listmanhinh = $manhinh->getAllnoLimit();
$maumay = new Maumay();
$listmaumay = $maumay->getAllnoLimit();
$trongluong = new Trongluong();
$listtrongluong = $trongluong->getAllnoLimit();
$thuonghieu = new Thuonghieu();
$listthuonghieu =  $thuonghieu->getAllNoLimit();
$dophangiai = new Dophangiai();
$listdophangiai =  $dophangiai->getAllNoLimit();
$tangsoquet = new Tangsoquet();
$listtangsoquet = $tangsoquet->getAllnoLimit();
$TNdatbiet = new TNdatbiet();
$listTNdatbiet = $TNdatbiet->getAllnoLimit();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $laptop->getlaptopById($id);
    } else {
        header('Location:index.php');
    }
}
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $count = $laptop->update($_POST);
    $_SESSION['success'] = "Sua thanh cong " . ' san pham';
    header('Location:edit.php?id=' . $id);
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
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <input type="hidden" value="<?php echo $obj['lt_id'] ?>" name="id" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $obj['lt_name'] ?>" name="laptopName" required>
                </div>
            </div>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Thương Hiệu</label>
                <div class="col-sm-10">
                    <select name="th_id">

                        <?php foreach ($listthuonghieu as $thuonghieu) {
                        ?>
                            <option <?php if ($thuonghieu['th_id'] == $obj['th_id']) echo 'selected'; ?> value="<?php echo $thuonghieu['th_id']  ?>"><?php echo $thuonghieu['th_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Nhu Cầu</label>
               <div class="col-sm-10">
                   <select name="nc_id">
            
                       <?php foreach ($listnhucau as $nhucau) {
                       ?>
                           <option <?php if($nhucau['nc_id'] == $obj['nc_id']) echo 'selected'; ?> value="<?php echo $nhucau['nc_id'] ?>"><?php echo $nhucau['nc_name'] ?></option>
                       <?php } ?>
                   </select>
               </div>
           </li>

           <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Màu máy</label>
               <div class="col-sm-10">
                   <select name="mm_id">
                   
                       <?php foreach ($listmaumay as $maumay) {
                       ?>
                           <option <?php if($maumay['mm_id'] == $obj['mm_id']) echo 'selected'; ?> value="<?php echo $maumay['mm_id'] ?>"><?php echo $maumay['mm_mau'] ?></option>
                       <?php } ?>
                   </select>
               </div>
           </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">CPU</label>
                <div class="col-sm-10">
                    <select name="cpu_id">
                   
                        <?php foreach ($listcpu as $cpu) {
                        ?>
                            <option <?php if($cpu['cpu_id'] == $obj['cpu_id']) echo 'selected'; ?> value="<?php echo $cpu['cpu_id'] ?>"><?php echo $cpu['cpu_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row">
             <label for="staticEmail" class="col-sm-2 col-form-label">RAM</label>
             <div class="col-sm-10">
                 <select name="ram_id">

                     <?php foreach ($listram as $ram) {
                     ?>
                         <option <?php if($ram['ram_id'] == $obj['ram_id']) echo 'selected'; ?> value="<?php echo $ram['ram_id'] ?>"><?php echo $ram['ram_dungluong'] ?></option>
                     <?php } ?>
                 </select>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tầng Số Quét</label>
                <div class="col-sm-10">
                    <select name="ts_id">

                        <?php foreach ($listtangsoquet as $tangsoquet) {
                        ?>
                         
                            <option <?php if($tangsoquet['ts_id'] == $obj['ts_id']) echo 'selected'; ?> value="<?php echo $tangsoquet['ts_id'] ?>"><?php echo $tangsoquet['ts_tangso'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Ổ Cứng</label>
               <div class="col-sm-10">
                   <select name="oc_id">
                   <option value="0">Các loai o cung&emsp;&emsp;</option>
                       <?php foreach ($listocung as $ocung ) {
                       ?>
                     
                           <option <?php if($ocung ['oc_id'] == $obj['oc_id']) echo 'selected'; ?> value="<?php echo $ocung ['oc_id'] ?>"><?php echo $ocung ['oc_name'] ?></option>
                       <?php } ?>
                   </select>
               </div>
           </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Màn hình</label>
                <div class="col-sm-10">
                    <select name="mh_id">
                 
                        <?php foreach ($listmanhinh as $manhinh) {
                        ?>
                   
                            <option <?php if($manhinh['mh_id'] == $obj['mh_id']) echo 'selected'; ?> value="<?php echo $manhinh['mh_id'] ?>"><?php echo $manhinh['mh_kichthuoc'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Trọng Lượng</label>
                <div class="col-sm-10">
                    <select name="tl_id">
                    <option value="0">Trọng Lượng Máy</option>
                        <?php foreach ($listtrongluong as $trongluong) {
                        ?>
                          
                            <option <?php if($trongluong['tl_id'] == $obj['tl_id']) echo 'selected'; ?> value="<?php echo $trongluong['tl_id'] ?>"><?php echo $trongluong['tl_trongluong'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Độ Phân Giải</label>
                <div class="col-sm-10">
                    <select name="dpg_id">
                    
                         <?php foreach ($listdophangiai as $dophangiai) {
                         ?>
                             
                             <option <?php if($dophangiai['dpg_id'] == $obj['dpg_id']) echo 'selected'; ?> value="<?php echo $dophangiai['dpg_id'] ?>"><?php echo $dophangiai['dpg_name'] ?></option>
                         <?php } ?>
                     </select>
                 </div>
             </li>

             <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tính Năng Đặt Biệt</label>
                <div class="col-sm-10">
                    <select name="dpg_id">
                    
                         <?php foreach ($listTNdatbiet as $TNdatbiet) {
                         ?>
                             
                            <option <?php if($TNdatbiet['tn_id'] == $obj['tn_id']) echo 'selected'; ?> value="<?php echo $TNdatbiet['tn_id'] ?>"><?php echo $TNdatbiet['tn_name'] ?></option>
                            <?php } ?>
                     </select>
                 </div>
             </li>

            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('./../../layouts/footer.php');
?>