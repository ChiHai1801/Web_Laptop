<?php
include('../../layouts/header.php');
include('../../Model/laptops.php');

include('../../Model/cpu.php');
include('../../Model/ram.php');
include('../../Model/ocung.php');
include('../../Model/nhucau.php');
include('../../Model/maumay.php');
include('../../Model/manhinh.php');
include('../../Model/hinhanh.php');
include('../../Model/trongluong.php');
include('../../Model/tangsoquet.php');
include('../../Model/thuonghieu.php');
include('../../Model/dophangiai.php');
include('../../Model/TNdatbiet.php');

$laptops = new Laptop();
$list = $laptops->getAllNoLimit();

$cpu = new Cpu();
$ram = new Ram();
$ocung = new Ocung();
$nhucau = new Nhucau();
$maumay = new Maumay();
$hinhanh = new Hinhanh();
$manhinh = new Manhinh(); 
$thuonghieu = new Thuonghieu();
$trongluong = new Trongluong();
$tangsoquet = new Tangsoquet();
$dophanngiai = new Dophangiai();
$TNdatbiet = new TNdatbiet();


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $laptops->delete($_GET['id']);
            }
            break;

        default:
            # code...
            break;
    }
}
?>

<body>

    <div class="main_containers">
        <table id="myTableSort" class="main-container" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm" scope="col">#</th>
                    <th class="th-sm" scope="col">Tên</th>
                    <th class="th-sm" scope="col">Thương hiệu</th>
                    <th class="th-sm" scope="col">CPU</th>
                    <th class="th-sm" scope="col">RAM</th>
                    <th class="th-sm" scope="col">Ổ cứng</th>
                    <th class="th-sm" scope="col">Nhu cầu</th>
                    <th class="th-sm" scope="col">Màu máy</th>
                    <th class="th-sm" scope="col">Màn hình</th>
                    <th class="th-sm" scope="col">Trọng lượng</th>
                    <th class="th-sm" scope="col">Độ phân giải</th>
                    <th class="th-sm" scope="col">Tầng số quét</th>
                    <th class="th-sm" scope="col">Tính Năng Đặt Biệt</th>
                    <th class="th-sm" scope="col">Thao tác</th>
                </tr>
            </thead>

            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody id="myTable">
                <?php
                foreach ($list as $r) { ?>
                    <tr>
                        <td><?php echo $r['lt_id'] ?></td>

                <!--Tên sản phẩm-->
                        <?php
                        $obj = $laptops->getlaptopById($r['lt_id']);
                        ?>
                        <td><?php echo $obj['lt_name'] ?></td>

                
                        <?php
                        $obj = $thuonghieu->getThuongHieuById($r['th_id']);
                        ?>
                        <td><?php echo $obj['th_name'] ?></td>
               
               
                        <?php
                        $obj = $cpu->getCpuById($r['cpu_id']);
                        ?>
                        <td><?php echo $obj['cpu_name'] ?></td>
                        
                        <?php
                        $obj = $ram->getramById($r['ram_id']);
                        ?>
                        <td><?php echo $obj['ram_dungluong'] ?></td>
                        
              
                        <?php
                        $obj = $ocung->getocungById($r['oc_id']);
                        ?>
                        <td><?php echo $obj['oc_name'] ?></td>
                        
               
                        <?php
                        $obj = $nhucau->getnhucauById($r['nc_id']);
                        ?>
                        <td><?php echo $obj['nc_name'] ?></td>
                        
              
                        <?php
                         $obj = $maumay->getmaumayById($r['mm_id']);
                         ?>
                         <td><?php echo $obj['mm_mau'] ?></td>
                        
            
                         <?php
                        $obj = $manhinh->getmanhinhById($r['mh_id']);
                        ?>
                        <td><?php echo $obj['mh_kichthuoc'] ?></td>

             
                         <?php
                        $obj = $trongluong->gettrongluongById($r['tl_id']);
                        ?>
                        <td><?php echo $obj['tl_trongluong'] ?></td>

               
                         <?php
                        $obj = $dophanngiai->getDophangiaiById($r['dpg_id']);
                        ?>
                        <td><?php echo $obj['dpg_name'] ?></td>

               
                         <?php
                        $obj = $tangsoquet->gettangsoquetById($r['ts_id']);
                        ?>
                        <td><?php echo $obj['ts_tangso'] ?></td>

              
                        <?php
                       $obj = $TNdatbiet->gettinhnangdatbietById($r['tn_id']);
                       ?>
                       <td><?php echo $obj['tn_name'] ?></td>
                     
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['lt_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['lt_id'] ?>">Sửa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
<?php
include('./../../layouts/footer.php');
?>