<?php
include('../../layouts/header.php');
include('../../Model/thongtinsp.php');
include('../../Model/laptops.php');

$thongtinsp = new TTsanpham();
$listthongtinsp= $thongtinsp->getAllnoLimit();
$laptops = new Laptop();
$listlaptops = $laptops->getAllnoLimit();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $thongtinsp->delete($_GET['id']);
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
    <!-- <div class="container"> -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Xuất xứ</th>
                    <th scope="col">Thông tin sản phẩm</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php
                foreach ($listthongtinsp as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['tt_id'] ?></td>
                    <!--Tên sản phẩm-->
                       <?php
                       $obj = $laptops->getlaptopById($r['lt_id']);
                       ?>
                       <td><?php echo $obj['lt_name'] ?></td>
                        <td><?php echo $r['tt_xuatxu'] ?></td>
                        <td><?php echo $r['tt_thongtinsp'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['tt_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['tt_id'] ?>">Sửa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>