<?php
session_start();

$is_homepage = true;
require_once('components/header.php');
?>
    <!-- Categories Section Begin -->
    <section class="categories py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2>Danh mục sản phẩm</h2>
            </div>
        </div>

        <div class="categories__slider owl-carousel">
            <?php
            $sql_str = "SELECT * FROM categories ORDER BY name";
            $result = mysqli_query($conn, $sql_str);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="item px-2">
                    <div class="bg-light p-3 rounded shadow text-center">
                        <h5><a href="#" class="text-dark text-decoration-none"><?= $row['name'] ?></a></h5>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2>Sản phẩm đặc trưng</h2>
            </div>
            <div class="col-12 text-center mb-3">
                <div class="btn-group" role="group" aria-label="Lọc danh mục">
                    <button type="button" class="btn btn-outline-black active" data-filter="*">Tất cả</button>
                    <?php
                    $sql_str = "SELECT * FROM categories ORDER BY name";
                    $result = mysqli_query($conn, $sql_str);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <button type="button" class="btn btn-outline-black" data-filter=".<?= $row['slug'] ?>"><?= $row['name'] ?></button>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="row featured__filter">
            <?php
            $sql_str = "SELECT products.id AS pid, products.name AS pname, images, price, disscounted_price, categories.slug AS cslug 
                        FROM products, categories 
                        WHERE products.category_id = categories.id";
            $result = mysqli_query($conn, $sql_str);

            while ($row = mysqli_fetch_assoc($result)) {
                $anh_arr = explode(';', $row['images']);
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 mix <?= $row['cslug'] ?>">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= "quantri/" . $anh_arr[0] ?>" class="card-img-top" alt="<?= $row['pname'] ?>">
                        <div class="card-body text-center">
                            <h6 class="card-title mb-2">
                                <a href="sanpham.php?id=<?= $row['pid'] ?>" class="text-decoration-none text-dark">
                                    <?= $row['pname'] ?>
                                </a>
                            </h6>
                            <div class="prices">
                                <del class="text-muted d-block"><?= number_format($row['price'], 0, '', '.') ?> VNĐ</del>
                                <span class="fw-bold text-primary"><?= number_format($row['disscounted_price'], 0, '', '.') ?> VNĐ</span>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent text-center">
                            <a href="#" class="btn btn-sm btn-outline-secondary me-1"><i class="fa fa-heart"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary me-1"><i class="fa fa-retweet"></i></a>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner_1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner_2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>2024 Web Developer Bootcamp</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>JavaScript Course 2024</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>React With Redux</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>2024 Web Developer Bootcamp</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>JavaScript Course 2024</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>React With Redux</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>2024 Web Developer Bootcamp</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>JavaScript Course 2024</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>React With Redux</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>2024 Web Developer Bootcamp</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>JavaScript Course 2024</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>React With Redux</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>2024 Web Developer Bootcamp</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>JavaScript Course 2024</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>React With Redux</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>2024 Web Developer Bootcamp</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>JavaScript Course 2024</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/product_3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>React With Redux</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                

                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Tin Tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
            $sql_str = "SELECT * FROM news ORDER BY created_at DESC LIMIT 0,3";
            $result = mysqli_query($conn, $sql_str);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?= 'quantri/' . $row['avatar'] ?>" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?= $row['created_at'] ?></li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="tintuc.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h5>
                                    <p><?= $row['sumary'] ?> </p>
                                </div>
                            </div>
                        </div>
                <?php } ?>
  
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

 <?php
 require_once('components/footer.php');
 ?>
