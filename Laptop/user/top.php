<?php
include('./admin/Model/laptops.php');
include('./admin/Model/thuonghieu.php');
include('./admin/Model/nhucau.php');
include('./admin/Model/cpu.php');
include('./admin/Model/ram.php');
include('./admin/Model/dophangiai.php');
include('./admin/Model/ocung.php');
include('./admin/Model/maumay.php');
include('./admin/Model/tangsoquet.php');
include('./admin/Model/trongluong.php');
include('./admin/Model/manhinh.php');
include('./admin/Model/TNdatbiet.php');


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
$TNdatbiet = new TNdatbiet();
$listTNdatbiet = $TNdatbiet->getAllnoLimit();
?>


<main>

<aside class="main__paner--ad">
           <div class="slideshow-container">
               <!-- ảnh và tiêu đề paner -->
               <div class="mySlides fade">
                 <img src="./images/laptop1.jpg">
                 <div class="text">Sản phẩm </div>
               </div>
         
               <div class="mySlides fade">
                 <img src="./images/laptop2.jpg">
                 <div class="text"> Đặt hàng online nhanh chóng</div>
               </div>
         
               <div class="mySlides fade">
                 <img src="./images/laptop3.jpg">
                 <div class="text">Laptop</div>
               </div>
         
               <!-- nút chuyển ảnh -->
               <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
               <a class="next" onclick="plusSlides(1)">&#10095;</a>
               
               
            </div> 
</aside>
 
        <div class="main_top">

            <div class="col-sm-10">
                <select name="th_id" class="col-sn">
                    <option value="0">Thương Hiệu</option>
                        <?php foreach ($listthuonghieu as $r) {
                        ?>
                        <option value="<?php echo $r['th_id']  ?>"><?php echo $r['th_name'] ?></option>
                       <?php } ?>
                </select>
            </div>

            <div class="col-sm-10">
                <select name="nc_id" class="col-sn">
                    <option value="0">Nhu cầu</option>
                        <?php foreach ($listnhucau as $r) {
                        ?>
                            <option value="<?php echo $r['nc_id'];  ?>"><?php echo $r['nc_name'] ?></option>
                        <?php } ?>
                    </select>
            </div>
          
            <div class="col-sm-10">
                   <select name="mm_id" class="col-sn">
                   <option value="0">Màu máy</option>
                       <?php foreach ($listmaumay as $r) {
                       ?>
                           <option value="<?php echo $r['mm_id'];  ?>"><?php echo $r['mm_mau'] ?></option>
                       <?php } ?>
                   </select>
            </div>

            <div class="col-sm-10">
                    <select name="cpu_id" class="col-sn">
                    <option value="0">CPU</option>
                        <?php foreach ($listcpu as $r) {
                        ?>
                            <option value="<?php echo $r['cpu_id'];  ?>"><?php echo $r['cpu_name'] ?></option>
                        <?php } ?>
                    </select>
            </div>
            
            <div class="col-sm-10">
                 <select name="ram_id" class="col-sn">
                 <option value="0">RAM</option>
                     <?php foreach ($listram as $r) {
                     ?>
                         <option value="<?php echo $r['ram_id'];  ?>"><?php echo $r['ram_dungluong'] ?></option>
                     <?php } ?>
                 </select>
            </div>

            <div class="col-sm-10">
                <select name="ts_id" class="col-sn">
                    <option value="0">Tầng số quét</option>
                        <?php foreach ($listtangsoquet as $r) {
                        ?>
                            <option value="<?php echo $r['ts_id'];  ?>"><?php echo $r['ts_tangso'] ?></option>
                        <?php } ?>
                    </select>
            </div>

            <div class="col-sm-10">
                   <select name="oc_id" class="col-sn">
                   <option value="0">Ổ Cứng</option>
                       <?php foreach ($listocung as $r) {
                       ?>
                           <option value="<?php echo $r['oc_id'];  ?>"><?php echo $r['oc_name'] ?></option>
                       <?php } ?>
                   </select>
            </div>

            <div class="col-sm-10">
                    <select name="mh_id" class="col-sn">
                    <option value="0">Kích Thước Màn hình</option>
                        <?php foreach ($listmanhinh as $r) {
                        ?>
                            <option value="<?php echo $r['mh_id'];  ?>"><?php echo $r['mh_kichthuoc'] ?></option>
                        <?php } ?>
                    </select>
            </div>

            <div class="col-sm-10">
                    <select name="tl_id" class="col-sn">
                    <option value="0">Trọng Lượng Máy</option>
                        <?php foreach ($listtrongluong as $r) {
                        ?>
                            <option value="<?php echo $r['tl_id'];  ?>"><?php echo $r['tl_trongluong'] ?></option>
                        <?php } ?>
                    </select>
            </div>

            <div class="col-sm-10">
                    <select name="dpg_id" class="col-sn">
                    <option value="0">Độ Phân Giải</option>
                         <?php foreach ($listdophangiai as $r) {
                         ?>
                             <option value="<?php echo $r['dpg_id'];  ?>"><?php echo $r['dpg_name'] ?></option>
                         <?php } ?>
                </select>
            </div>

            <div class="col-sm-10">
                   <select name="tn_id" class="col-sn">
                   <option value="0">Tính Năng Đặt Biệt</option>
                        <?php foreach ($listTNdatbiet as $r) {
                        ?>
                            <option value="<?php echo $r['tn_id'];  ?>"><?php echo $r['tn_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            
        </div>
</main>