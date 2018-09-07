<?php
require_once("includes/config.php");
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $q = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' AND `is_active`=1";
    $user = mysqli_query($connection, $q);
    query_check($user);

    // mysqli_affected_rows($connection);
    // mysqli_num_rows($users);

    if (mysqli_affected_rows($connection) != 0) {

        $user = mysqli_fetch_array($user);
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        redirect('bimehkhan/index.php');

    } else {
        $found = false;
    }

}
?>


<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>به زودی بیمه خان</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body>

<!-- home
================================================== -->
<main class="s-home s-home--slides">

    <div class="home-slider">
        <div class="home-slider-img" style="background-image: url(images/slides/slide-01.jpg);"></div>
        <div class="home-slider-img" style="background-image: url(images/slides/slide-02.jpg);"></div>
        <div class="home-slider-img" style="background-image: url(images/slides/slide-03.jpg);"></div>
    </div>

    <div class="overlay"></div>

    <div class="home-content">

        <div class="home-logo">
            <a href="index-slides.html">
                <img src="images/logo.svg" alt="Homepage">
            </a>
        </div>

        <div class="row home-content__main">

            <div class="col-eight home-content__text pull-right">
                <h3>به بیمه خان خوش آمدید</h3>

                <h1>
                    ما در حال حاضر کار می کنیم <br>
                    برای ارایه یک وب سایت <br>فوق العاده
                </h1>


            </div>  <!-- end home-content__text -->

            <div class="col-four home-content__counter">
                <h3>تاریخ راه اندازی سایت</h3>


                <div class="home-content__clock">
                    <div class="top">
                        <div class="time days">
                            22
                            <span>روز</span>
                        </div>
                    </div>
                    <div class="time hours time-left">
                        09
                        <span class="time-left">ساعت</span>
                    </div>
                    <div class="time minutes time-left">
                        54
                        <span class="time-left">ثانیه</span>
                    </div>
                    <div class="time seconds time-left">
                        30
                        <span class="time-left">ثانیه</span>
                    </div>
                </div>  <!-- end home-content__clock -->
            </div>  <!-- end home-content__counter -->

        </div>  <!-- end home-content__main -->

        <ul class="home-social">
            <li>
                <a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-behance" aria-hidden="true"></i><span>Behance</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>
            </li>
        </ul> <!-- end home-social -->

        <div class="row home-copyright">
            <span>Copyright Count 2018</span>
            <span>Design by <a href="https://www.styleshout.com/">styleshout</a></span>
        </div> <!-- end home-copyright -->


        <div class="home-content__line"></div>

    </div> <!-- end home-content -->

</main> <!-- end s-home -->


<!-- info
================================================== -->
<a class="info-toggle" href="#0">
    <span class="icon"><i class="fas fa-sign-in-alt fa-2x"></i></span>
</a>

<div class="s-info">

    <div class="row info-wrapper">
        <div class="box-login">
            <header class="header-login">
                <h4>برای مشاهده سایت لطفا وارد شوید</h4>
            </header>
            <div class="form-login">

                <form action="ComingSoon.php" method="post" enctype="multipart/form-data">
                    <label for="user-in">نام کاربری</label>
                    <span><i class=" fa fa-user"></i> </span><input id="user-in" type="text" placeholder=" "
                                                                    name="username">
                    <label for="pass-in">رمز عبور </label>
                    <span><i class="fa fa-key"></i> </span><input id="pass-in" type="password" placeholder=""
                                                                  name="password">
                    <p class="text-center">
                        <button class="btn" name="login" type="submit">ورود</button>
                    </p>

                </form>
            </div>


        </div>


        <!-- end info contact -->

    </div>  <!-- end info wrapper -->

</div> <!-- end s-info -->


<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader">
        <div class="line-scale-pulse-out">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<!-- Java Script
================================================== -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>


</body>

</html>