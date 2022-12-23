<?php
include('../../layouts/header.php');
include('../../Model/ocung.php');
include('../../lib/upload.php');
$ocung = new Ocung();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $ocung->delete($_GET['id']);
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
                    <th scope="col">Tên ổ cứng</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php

                $list = $ocung->getAllNoLimit();

                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['oc_id'] ?></td>
                        <td><?php echo $r['oc_name'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['oc_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['oc_id'] ?>">Sửa</a>
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