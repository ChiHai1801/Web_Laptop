<?php
include("./user/header.php");
include("./admin/Model/hinhanh.php");
include("./admin/Model/laptops.php");

$hinhanh = new Hinhanh();
$list = $hinhanh->getAllnoLimit();
$laptops = new Laptop();

?>
    <main class="main one__column__two__rows" >
              
        <article class="main__content two__column__one__row">  
            <aside class="content__filter">
                <ul class="filter" >
                    <li class="filter__header"><h2>Thương Hiệu</h2></li>
                    <a href="./TH_acer.php"><li class="filter__items">Acer </li></a>
                    <a href="./TH_asus.php "><li class="filter__items">Asus</li></a>
                    <a href="./TH_dell.php"><li class="filter__items">Dell</li></a>
                    <a href="./TH_HP.php"><li class="filter__items">HP</li></a>
                    <a href="./TH_intel.php"><li class="filter__items">Intel</li></a>
                    <a href="./TH_lenovo.php"><li class="filter__items">Lenovo</li></a>
                    <a href="./TH_MSI.php"><li class="filter__items">MSI</li></a>
                </ul>
            </aside>


        <article class="content__product">
            <div class="product__title">
                <h2>HP</h2>
            </div>

            <?php
            foreach ($list as $r) { ?>
            <li class="product__cards">
                <div class="product__card">

                    <!--lấy hình ảnh-->
                        <img height="120px" width="200px" 
                        src="<?php echo 'http://localhost/Laptop/admin/pages/hinhanh/uploads/' . $r['img'] ?>">
                          
                      <div class="card-content">
                          <div class="card-top">

                    <!--Tên sản phẩm-->
                              <h3 class="card-title">
                                  <?php
                                      $obj = $laptops->getlaptopById($r['lt_id']);
                                  ?>
                                    <td><?php echo $obj['lt_name'] ?></td>
                              </h3>
                          </div>
                            
                          <div class="card-bottom">
                              <!-- <div class="card__price"> -->
                                <!-- 135000 -->
                              <!-- </div> -->
                              <div class="add__cart">
                                  <input class="add__item" type="button" value="thêm vào giỏ hàng">
                              </div>
                          </div>
                      </div>
                </div>
            </li>  
            <?php } ?>

            <a class="next__product" href="#!">Xem thêm ...</a>
        </article> 
        </article>  
    </main>
    
<?php
include("./user/footer.php");
?>