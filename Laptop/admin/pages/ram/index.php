<?php
include('../../layouts/header.php');
include('../../Model/ram.php');

$ram = new Ram();
$list = $ram->getAllNoLimit();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $ram->delete($_GET['id']);
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
                    <th scope="col">Dung lượng</th>
                    <th scope="col">Loại RAM</th>
                    <th scope="col">Tốc độ BUS RAM</th>
                    <th scope="col">Hỗ trợ RAM tối đa</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php



                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['ram_id'] ?></td>
                        <td><?php echo $r['ram_dungluong'] ?></td>
                        <td><?php echo $r['ram_loairam'] ?></td>
                        <td><?php echo $r['ram_tocdobusram'] ?></td>
                        <td><?php echo $r['ram_htramtoida'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['ram_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['ram_id'] ?>">Sửa</a>
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