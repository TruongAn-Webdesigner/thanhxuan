<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Srisakdi:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ballet&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <!-- /google font -->
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- /fontawsome -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    
</head>

<body>
    <!-- menu -->
    <div class="bg-menu" id="menu">
        <div class="boxcenter">
            <div class="logo">
                <div class="box-logo"><img src="../uploads/images/logo.png" alt="" srcset=""></div>
                
            </div>
            <div class="menu">
                <ul>
                    <li><a href="<?= SITE_URL ?>">Home</a></li>
                    <li><a href="http://">About</a></li>
                    <li><a href="http://">Tính Calo</a></li>
                    <li><a href="<?= SITE_URL ?>/?act=thucdon">Thực đơn</a></li>
                    <li><a href="<?= SITE_URL ?>/?act=blog">Blog</a></li>

                    <li class="nav-item dropdown">
                        <?php if (isset($_SESSION['user'])) { ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['user'] ?>
                            </a>

                        <?php } else { ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tài khoản
                            </a>
                        <?php } ?>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (!isset($_SESSION['user'])) { ?>
                                <a class="dropdown-item" href="<?= SITE_URL ?>/?act=login">Đăng nhập</a>
                                <a class="dropdown-item" href="/banhang/quen-mat-khau/">Quên mật khẩu</a>
                                <a class="dropdown-item" href="/banhang/dang-ky/">Đăng ký thành viên</a>
                            <?php } ?>
                            <a class="dropdown-item" href="<?= SITE_URL ?>/?act=logout">Đăng xuất</a>
                            <a class="dropdown-item" href="/banhang/doi-mat-khau/">Đổi mật khẩu</a>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php
    if (isset($page_file) == true) {
        require_once "$page_file";
    }
    ?>

    <div class="row-handmake">
        <footer>
            <div class="bg-footer">
                <div class="boxcenter">
                    <div class="bg-title-find">Find us</div>
                </div>
                <div class="boxcenter">
                    <div class="box-find-1">
                        <div class="title-1">
                            <i class="fa fa-phone" aria-hidden="true"></i> SĐT
                        </div>
                        <div class="infor-1">
                            +0283 382 38329 <br>
                            +3847 3728 38293
                        </div>
                    </div>
                    <div class="box-find-2">
                        <div class="title-2">
                            <i class="fa fa-address-book-o" aria-hidden="true"></i> Địa chỉ
                        </div>
                        <div class="infor-2">
                            4 đường abc, cầu abc, lalala
                        </div>
                    </div>
                    <div class="box-find-3">
                        <div class="title-3">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> Email
                        </div>
                        <div class="infor-3">
                            + abc@gmail.com
                        </div>
                    </div>
                </div>
            </div>
            <div class="icon">
                <div class="boxcenter">
                    <i class="fa fa-facebook-official" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </div>
            </div>
        </footer>
    </div>
    
</body>

</html>