<?php
include('../../layouts/header.php');
include('../../Model/trongluong.php');
include('../../lib/upload.php');
$trongluong = new Trongluong();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $trongluong->delete($_GET['id']);
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
                    <th scope="col">Trọng lượng máy</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php

                $list = $trongluong->getAllNoLimit();

                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['tl_id'] ?></td>
                        <td><?php echo $r['tl_trongluong'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['tl_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['tl_id'] ?>">Sửa</a>
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