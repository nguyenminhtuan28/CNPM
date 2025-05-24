<?php //session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Udemy | Study Course</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <!-- <div class="header__top__right__language">
                <img src="../img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> -->
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/shop.php">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> pentest@gmail.com</li>
                <li>Trang bán khóa học</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> pentest@gmail.com</li>
                                <li>Trang bán khóa học</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <!-- <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0942.814.192</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div> -->
                            <div class="header__top__right__social">
                                <i class="fa fa-phone"></i> 0942.814.192
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <!-- <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- <div class="hero__search"> -->
                        <div class="hero__search__form">
                            <form action="timkiem.php" method="get">
                                <!-- <div class="hero__search__categories"> -->
                                    <!-- Tất cả danh mục
                                    <span class="arrow_carrot-down"></span> -->
                                    <select name="danhmuc">
                                        <option value='*'>Tất cả danh mục</option>
                                        <?php
                                        require('./ketnoicsdl/conn.php');
                                        $sql_str = "select * from categories order by name";
                                        $result = mysqli_query($conn, $sql_str);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <option value=<?= $row['id'] ?>><?= $row['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                <!-- </div> -->
                                <input type="text" name="tukhoa" placeholder="Bạn cần tìm gì?">
                                <button type="submit" class="site-btn">Tìm</button>
                            </form>
                        </div>
                        
                    <!-- </div> -->
                </div>
                
                <!-- <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/shop.php">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div> -->
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="./cart.php"><i class="fa fa-shopping-bag"></i> <span>
                                <?php
                                $cart = [];
                                if (isset($_SESSION['cart'])) {
                                    $cart = $_SESSION['cart'];
                                }
                                // print_r($cart);exit;
                                $count = 0;  //hien thi so luong san pham trong gio hang
                                $tongtien = 0;
                                foreach ($cart as $item) {
                                    $count += $item['qty'];
                                    $tongtien += $item['qty'] * $item['disscounted_price'];
                                }
                                //hien thi so luong
                                echo $count;
                                ?>
                            </span></a></li>
                        </ul>
                        <div class="header__cart__price">Tổng tiền: <span><?= number_format($tongtien, 0, '', '.') . " VNĐ" ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <?php
    if ($is_homepage) {
        echo '<section class="hero">';
    } else {
        echo '<section class="hero hero-normal">';
    }
    ?>
    <!-- <section class="hero"> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul>
                            <?php

                            $sql_str = "select * from categories order by name";
                            $result = mysqli_query($conn, $sql_str);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <li><a href="#"><?= $row['name'] ?></a></li>

                            <?php } ?>
                         
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                <!-- <div class="col-lg-6"> -->
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/">Trang chủ</a></li>
                            <li><a href="/shop.php">Cửa hàng</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Tin tức</a></li>
                            <li><a href="./contact.html">Liên hệ</a></li>
                        </ul>
                    </nav>
                <!-- </div> -->
                    
                    <?php
                    if ($is_homepage) {
                        ?>
         <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                                <div class="hero__text">
                                    <span>Study Course</span>
                                    <h2>How Coursera compares to Udemy <br />compares to Udemy</h2>
                                    <p>Discover why Coursera is the best choice for equipping your team with world-class skills and education.</p>
                                    <a href="#" class="primary-btn">SHOP NOW</a>
                                </div>
                            </div>
        <?php
                    }
                    ?>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
