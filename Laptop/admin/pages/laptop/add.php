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
include('../../Model/tangsoquet.php');
include('../../Model/trongluong.php');
include('../../Model/manhinh.php');
include('../../lib/upload.php');
include('../../Model/TNdatbiet.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if (isset($_POST['submit'])) {
    $laptops = new Laptop();
        $count = $laptops->insert($_POST);
        $_SESSION['success'] = 'Thêm thành công';
      
}

// get brand  and cate to show on select
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
$TNdatbiets = new TNdatbiet();
$listTNdatbiets = $TNdatbiets->getAllnoLimit();
?>

<body >
<div class="main_container">

    <!-- <div class="container"> -->
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
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên Sản Phẩm:</label>
                <div class="col-sm-10">
                    <input type="text" name="lt_name" required>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Thương Hiệu</label>
                <div class="col-sm-10">
                    <select name="th_id">
                    <option value="0">Chon thương hiệu</option>
                        <?php foreach ($listthuonghieu as $r) {
                        ?>
                            <option value="<?php echo $r['th_id']  ?>"><?php echo $r['th_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>
        
            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nhu Cầu</label>
                <div class="col-sm-10">
                    <select name="nc_id">
                    <option value="0">Chon the loai</option>
                        <?php foreach ($listnhucau as $r) {
                        ?>
                            <option value="<?php echo $r['nc_id'];  ?>"><?php echo $r['nc_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>


            <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Màu máy</label>
               <div class="col-sm-10">
                   <select name="mm_id">
                   <option value="0">Chon màu</option>
                       <?php foreach ($listmaumay as $r) {
                       ?>
                           <option value="<?php echo $r['mm_id'];  ?>"><?php echo $r['mm_mau'] ?></option>
                       <?php } ?>
                   </select>
               </div>
           </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">CPU</label>
                <div class="col-sm-10">
                    <select name="cpu_id">
                    <option value="0">Các loai cpu</option>
                        <?php foreach ($listcpu as $r) {
                        ?>
                            <option value="<?php echo $r['cpu_id'];  ?>"><?php echo $r['cpu_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row">
             <label for="staticEmail" class="col-sm-2 col-form-label">RAM</label>
             <div class="col-sm-10">
                 <select name="ram_id">
                 <option value="0">Các loai ram</option>
                     <?php foreach ($listram as $r) {
                     ?>
                         <option value="<?php echo $r['ram_id'];  ?>"><?php echo $r['ram_dungluong'] ?></option>
                     <?php } ?>
                 </select>
                </div>
            </li>


            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tầng Số Quét</label>
                <div class="col-sm-10">
                    <select name="ts_id">
                    <option value="0">Các loai tang so quet</option>
                        <?php foreach ($listtangsoquet as $r) {
                        ?>
                            <option value="<?php echo $r['ts_id'];  ?>"><?php echo $r['ts_tangso'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Ổ Cứng</label>
               <div class="col-sm-10">
                   <select name="oc_id">
                   <option value="0">Các loai o cung&emsp;&emsp;</option>
                       <?php foreach ($listocung as $r) {
                       ?>
                           <option value="<?php echo $r['oc_id'];  ?>"><?php echo $r['oc_name'] ?></option>
                       <?php } ?>
                   </select>
               </div>
           </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Màn hình</label>
                <div class="col-sm-10">
                    <select name="mh_id">
                    <option value="0">Kích Thước Màn hình</option>
                        <?php foreach ($listmanhinh as $r) {
                        ?>
                            <option value="<?php echo $r['mh_id'];  ?>"><?php echo $r['mh_kichthuoc'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Trọng Lượng</label>
                <div class="col-sm-10">
                    <select name="tl_id">
                    <option value="0">Trọng Lượng Máy</option>
                        <?php foreach ($listtrongluong as $r) {
                        ?>
                            <option value="<?php echo $r['tl_id'];  ?>"><?php echo $r['tl_trongluong'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Độ Phân Giải</label>
                <div class="col-sm-10">
                    <select name="dpg_id">
                    <option value="0">Độ Phân Giải</option>
                         <?php foreach ($listdophangiai as $r) {
                         ?>
                             <option value="<?php echo $r['dpg_id'];  ?>"><?php echo $r['dpg_name'] ?></option>
                         <?php } ?>
                     </select>
                 </div>
             </li>

             <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Tính Năng Đặt Biệt</label>
               <div class="col-sm-10">
                   <select name="tn_id">
                   <option value="0">Tính Năng Đặt Biệt</option>
                        <?php foreach ($listTNdatbiets as $r) {
                        ?>
                            <option value="<?php echo $r['tn_id'];  ?>"><?php echo $r['tn_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>

    </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>