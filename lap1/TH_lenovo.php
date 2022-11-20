<?php
include("./user/header.php");
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
                      <h2>Lenovo</h2>
                    </div>
                    <div class="product__cards">
                      
                        <div class="product__card">
                          <img src="./images/products/01.jpg" alt="" class="card-image"/>
                          <div class="card-content">
                            <div class="card-top">
                              <h3 class="card-title">Laptop asus 2022</h3>
                              <p class="item-id" hidden>001</p>
                              <!-- <div class="card-type"> -->
                                <!-- Loại: <small>trái cây</small>  -->
                              <!-- </div> -->
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
      
      
                          <img src="" alt="" width="50px">
                    </div>
                   <a class="next__product" href="#!">Xem thêm ...</a>
                  </article> 
              </article>  
      </main>
      <?php
include("./user/footer.php");
?>