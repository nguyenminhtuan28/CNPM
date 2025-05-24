<?php
session_start();
$is_homepage = false;

require_once('./ketnoicsdl/conn.php');



require_once('components/header.php');
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Hoàn thành</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Hoàn thành</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4 style="text-align: center;">Cảm ơn bạn đã đặt hàng trên hệ thống của chúng tôi<br>Chúng tôi sẽ sớm liên
                hệ với bạn để chốt đơn hàng!
            </h4>


        </div>
    </div>
</section>
<!-- Checkout Section End -->

<?php

require_once('components/footer.php');
?>