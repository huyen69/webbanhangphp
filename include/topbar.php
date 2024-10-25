<!-- top bar -->
<!-- top-header -->
<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-4 header-most-top">
                <p class="text-white text-lg-left text-center">Dev lap shop
                    <i class="fas fa-shopping-cart ml-1"></i>
                </p>
            </div>
            <div class="col-lg-8 header-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>
                    <li class="text-center border-right text-white">
                        <a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
                            <i class="fas fa-map-marker mr-2"></i>Quốc gia</a>
                    </li>
                    <li class="text-center border-right text-white">
                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                            <i class="fas fa-truck mr-2"></i>Giao hàng nhanh</a>
                    </li>
                    <li class="text-center border-right text-white">
                        <i class="fas fa-phone mr-2"></i> +84 234 456 789
                    </li>
                    <li>
                        <?php
                        if (!isset($_SESSION['auth']['email'])) {
                            echo '
                            <ul style="display:flex;">
                                <li style="margin-left:15px;" class="text-center text-white">
                                
                            <a href="./include/dangnhap.php" class="text-white">
                            <i class=""</i>Login</a>
                            </li>
                            <li style="margin: 0px 150px;" class="text-center text-white">
                            <a href="./include/register.php" class="text-white">
                                <i class=""></i>Register</a>
                            </li>
                            </ul>';
                            
                        } else {
                            echo '<div style="color: white ;margin: 1px 40px; font-size: 17px;" class="d-flex flex-row gap-3 align-items-center">';
                            if (isset($_SESSION['auth']['customer'])) {
                                echo '<b style="font-size: 20px;" class="text-white">';
                                echo $_SESSION['auth']['customer'];
                                echo '</b>';
                            }
                            echo '
                            <form method="POST" action="./include/logout.php">
                                <button style="margin: 1px 130px; background:brown; border:0;" name="submit" class="btn btn-primary">Đăng xuất</button>
                            </form>
                            </div>';
                        }
                        ?>
                    </li>
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal(select-location) -->
<div id="small-dialog1" class="mfp-hide">
    <div class="select-city">
        <h3>
            <i class="fas fa-map-marker"></i> Please Select Your Location
        </h3>
        <select class="list_of_cities">
            <optgroup label="Cities">
                <option selected style="display:none;color:#eee;">Select City</option>
                <option>USA</option>
                <option>Japan</option>
                <option>Viet Nam</option>
                <option>India</option>
                <option>Los Angeles</option>
                <option>Boise</option>
                <option>Chicago</option>
                <option>Indianapolis</option>
            </optgroup>
        </select>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //shop locator (popup) -->


<!-- //top-header -->

<!-- header-bottom-->
<div class="header-bot">
    <div class="container">
        <div class="row header-bot_inner_wthreeinfo_header_mid">
            <!-- logo -->
            <div id="main-bar" style="text-align: center;">
                <a href="index.php" class="font-weight-bold font-italic">
                    <img src="images/logo.png" alt style="height: 80px;" class="img-fluid">
                </a>
                <div id="banner">Development laptop shop</div>
            </div>
            <!-- //logo -->
            <!-- header-bot -->
            <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                <div class="row">
                    <!-- search -->
                    <div class="col-10 agileits_search">
                        <form class="form-inline" action="#" method="post">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>
                            <button class="btn my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- //search -->
                    <!-- Cart details -->
                    <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                        <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                            <form action="index.php?quanly=giohang" method="post" class="last">
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="display" value="1">
                                <button class="btn w3view-cart" type="submit" name="submit" value="">
                                    <i class="fas fa-cart-arrow-down"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- //cart details -->
                </div>
            </div>
        </div>
    </div>
</div>
