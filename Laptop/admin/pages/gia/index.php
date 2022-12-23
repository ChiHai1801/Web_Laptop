<?php
include('../../layouts/header.php');
include('../../Model/gia.php');
$gia = new Gia();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $gia->delete($_GET['id']);
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
                    <th scope="col">Giá</th>
                    <th scope="col">Ngày</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
        
            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php

                $list = $gia->getAllnoLimit();

                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['gia_id'] ?></td>
                        <td><?php echo $r['gia'] ?></td>
                        <td><?php echo $r['ngay'] ?></td>

                        
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['gia_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['gia_id'] ?>">Sửa</a>
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