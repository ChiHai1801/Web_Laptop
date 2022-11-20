<?php
require_once('../../layouts/header.php');
require_once('../../Model/laptops.php');
require_once('../../Model/thuonghieu.php');
require_once('../../Model/nhucau.php');
require_once('../../Model/cpu.php');
require_once('../../Model/ram.php');
require_once('../../Model/dophangiai.php');
require_once('../../Model/ocung.php');
require_once('../../Model/sanpham.php');
require_once('../../Model/hinhanh.php');
require_once('../../Model/tangsoquet.php');
require_once('../../Model/trongluong.php');
require_once('../../Model/manhinh.php');
require_once('../../lib/upload.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if (isset($_FILES['files']) && isset($_POST['submit'])) {
    $laptops = new Laptop();
    //check file upload
    $hinhanh = new Hinhanh();
    $src = $hinhanh->update($payload);
    $uploadContentImg = new Hinhanh();
    $srcOfContent = $uploadContentImg->update(3);
    // print_r($src);
    if ($src != null) { //upload funtion return
        $count = $laptops->insert($_POST, $src, $srcOfContent);
        if ($count == 1) {
            $_SESSION['success'] = 'Thêm thành công';
        }
    }
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
$hinhanh = new Hinhanh();
$listhinhanh = $hinhanh->getAllnoLimit();
$sanpham = new Sanpham();
$listsanpham = $sanpham->getAllnoLimit();
$trongluong = new Trongluong();
$listtrongluong = $trongluong->getAllnoLimit();
$thuonghieu = new Thuonghieu();
$listthuonghieu =  $thuonghieu->getAllNoLimit();
$dophangiai = new Dophangiai();
$listdophangiai =  $dophangiai->getAllNoLimit();
$tangsoquet = new Tangsoquet();
$listtangsoquet = $tangsoquet->getAllnoLimit();
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
        <div class="form-in">
           <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Sản Phẩm</label>
                <div class="col-sm-10">
                    <select name="sp_id">
                    <option value="0">Tên Sản Phẩm</option>
                        <?php foreach ($listsanpham as $r) {
                        ?>
                            <option value="<?php echo $r['sp_id']  ?>"><?php echo $r['sp_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>

            <li class="form-group row right">
               <label for="staticEmail" class="col-sm-2 col-form-label">Xuất xứ</label>
               <div class="col-sm-10">
                   <select name="sp_xuatxu">

                   <?php foreach ($listsanpham as $r) {
                    ?>
                        <option value="<?php echo $r['sp_id']  ?>"><?php echo $r['sp_xuatxu'] ?></option>
                        
                    <?php } ?>
                   </select>
               </div>
            </li>
        </div>

        <div class="form-in">
            <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Mô Tả</label>
               <div class="col-sm-10">
                   <select name="sp_mota">

                   <?php foreach ($listsanpham as $r) {
                    ?>
                        <option value="<?php echo $r['sp_id']  ?>"><?php echo $r['sp_mota'] ?></option>
                        
                    <?php } ?>
                   </select>
               </div>
            </li>
            

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Giá</label>
                <div class="col-sm-10">
                    <input type="text" name="price" placeholder="...vnđ"  required>
                </div>
            </li>
            </div>

            <div class="form-in">
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
            </div>

            <div class="form-in">
            <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Hình Ảnh</label>
               <div class="col-sm-10">
                   <select name="nc_id">
                   <option value="0">Chon hinh</option>
                       <?php foreach ($listhinhanh as $r) {
                       ?>
                           <option value="<?php echo $r['ha_id'];  ?>"><?php echo $r['img'] ?></option>
                       <?php } ?>
                   </select>
               </div>
           </li>
        

            <!-- <li class="form-group row"> -->
                <!-- <label for="staticEmail" class="col-sm-2 col-form-label">Hình ảnh(chọn 3 hình)</label> -->
                <!-- <div class="col-sm-10"> -->
                    <!-- <input type="file" name="img" multiple required /> -->
                <!-- </div> -->
            <!-- </li> -->

            
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
            </div>

        <div class="form-in">
            <li class="form-group row">
             <label for="staticEmail" class="col-sm-2 col-form-label">RAM</label>
             <div class="col-sm-10">
                 <select name="ts_id">
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
                            <option value="<?php echo $r['ts_id'];  ?>"><?php echo $r['ts_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>
        </div>

            <div class="form-in">
            <li class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Ổ Cứng</label>
               <div class="col-sm-10">
                   <select name="ts_id">
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
                    <option value="0">Các loai Màn hình &nbsp;&nbsp;</option>
                        <?php foreach ($listmanhinh as $r) {
                        ?>
                            <option value="<?php echo $r['mh_id'];  ?>"><?php echo $r['mh_kichthuoc'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>
            </div>

            <div class="form-in">
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

            </div>

            <input type="submit" name="submit" value="Up Load" class="btn btn-primary"></input>

    </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>