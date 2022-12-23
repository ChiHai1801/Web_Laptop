<?php
include('../../layouts/header.php');
include('../../Model/laptops.php');
include('../../Model/hinhanh.php');
include('../../Model/gia.php');
$laptops = new Laptop();
$gia = new Gia();
$hinhanh = new Hinhanh();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $hinhanh->delete($_GET['id']);
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
        
            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php

                $list = $hinhanh->getAllnoLimit();

                foreach ($list as $r) { ?>
                    <tr>
                        <td><?php echo $r['ha_id'] ?></td>
                        
                       <?php
                       $obj = $laptops->getlaptopById($r['lt_id']);
                       ?>
                       <td><?php echo $obj['lt_name'] ?></td>


                        <td> <img height="50px" width="70px" src="<?php echo 'uploads/' . $r['img'] ?>" alt=""> </td>
                        
                        <?php
                       $obj = $gia->getGiaById($r['gia_id']);
                       ?>
                       <td><?php echo $obj['gia'] ?></td>

                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['ha_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['ha_id'] ?>">Sửa</a>
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