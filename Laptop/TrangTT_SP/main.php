<?php
include('../admin/Model/thongtinsp.php');
include('../admin/Model/laptops.php');
include('../admin/Model/hinhanh.php');
$hinhanh = new Hinhanh();
$list = $hinhanh->getAllnoLimit();
$thongtinsp = new TTsanpham();
$listthongtinsp = $thongtinsp->getAllnoLimit();

$laptops = new Laptop();
?>

<div class="main">

        <article class="new_article ">
            <!-- nội dung bên phải  -->
            <h1 class="article_title article_title--primary ">THÔNG TIN SẢN PHẨM</h1>

        
        
            <div class="col_3-9">
            <?php
        foreach ($list as $r) { ?>
            <!--phần thông tin-->
                <h2 class="section_title section_title--secondary ">

            <!-- tên laptop  -->
                        <?php
                        $obj = $laptops->getlaptopById($r['lt_id']);
                        ?>
                        <td><?php echo $obj['lt_name'] ?></td>
                </h2>
               
                <div class="article_section_content ">
            <!--hình ảnh-->
                    <div>
                        <img height="120px" width="200px" src="<?php echo 'http://localhost/Laptop/admin/pages/hinhanh/uploads/' . $r['img'] ?>">
                        <div>
                    <?php } ?>

                    <p class="section_content "> 
                        <?php
                        foreach ($listthongtinsp as $r2) { ?>
                        <?php
                        $obj = $thongtinsp->getthongtinspById($r2['lt_id']);
                            ?>
                        <td><?php echo $obj['tt_thongtinsp'] ?></td>
                       
                            <!-- <div id="full1" class="content_span content_span--extra-off"> -->
                                <!-- <p> -->
                                <!-- </p> -->
                            <!-- </div> --> 
                        <?php } ?>
                            <a href="#" class="read-more-less" > Xem thêm</a>
                        </p>
                    </div> 
                </div>
            </div>
        </div>
       
    </article>
       

</div>