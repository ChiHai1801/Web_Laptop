<?php
require_once('../../layouts/header.php');
require_once('../../Model/sanpham.php');
$sanpham = new Sanpham();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $sanpham->delete($_GET['id']);
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
                    <th scope="col">Xuất xứ</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            
           <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php

                $list = $sanpham->getAllNoLimit();

                foreach ($list as $r) {
                ?>
                <tr>
                    <td><?php echo $r['sp_id'] ?></td>
                    <td><?php echo $r['sp_name'] ?></td>
                    <td><?php echo $r['sp_xuatxu'] ?></td>
                    <td><?php echo $r['sp_mota'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['sp_id']; ?>">Xoá</a>
                        <a class="btn btn-warning" href="edit.php?id=<?php echo $r['sp_id'] ?>">Sửa</a>
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
require_once('../../layouts/footer.php');
?>