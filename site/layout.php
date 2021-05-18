<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bán Điện Thoại ASM - PHP 2</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../admin/template/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Favicons -->
  <link href="Bethany/assets/img/favicon.png" rel="icon">
  <link href="Bethany/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Bethany/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Bethany/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="Bethany/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="Bethany/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="Bethany/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="Bethany/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="Bethany/assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="Bethany/assets/vendor/jquery/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
  <!-- Template Main CSS File -->
  <link href="Bethany/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v3.0.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="style/home.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="<?=SITE_URL?>/?act=home"><span>Bán Điện Thoại</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="<?=SITE_URL?>/?act=home">Trang chủ</a></li>
            <li><a href="#about">Về chúng tôi</a></li>
            <li><a href="#services">Dịch vụ</a></li>
            <li><a href="?act=product">Sản phẩm</a></li>
            <!---------- drop down ---------->

            
            <li><a href="#contact">Liên hệ</a></li>
            <li class="drop-down"><a href="">Nhà sản xuất</a>
              <ul>
                <?php $listnsx = $this->model_nhasanxuat->listrecordsNSX();            
                  foreach ($listnsx as $nsx) { ?>
                    <li><a href="<?=SITE_URL?>/?act=product&id=<?=$nsx['idnsx']?>"><?=$nsx['tennsx']?></a></li>
                <?php } ?>
                  
                <!-- <li class="drop-down"><a href="#">Drop Down 2</a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li> -->
                <!-- <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                <li><a href="#">Drop Down 5</a></li> -->
              </ul>
            </li>            
            <?php if (isset($_SESSION['nameus'])==true) { ?>
              <li class="drop-down"><a href=""><i class="far fa-user-circle"></i></a>
                <ul>
                  <li><a href="#"><?=$_SESSION['nameus']?></a></li>
                  <li><a href="#">Hồ sơ của tôi</a></li>
                  <li><a href="?act=doimatkhau">Đổi mật khẩu</a></li>
                  <li><a href="?act=logout">Đăng xuất</a></li>
                </ul>
              </li>
            <?php } else { ?>
              <li>
                <a href="?act=login">Đăng nhập</a>
              </li>
            <?php } ?>
            <?php 
            $sosptronggio = 0;
            foreach($_SESSION['giohang'] as $idProduct => $sp) {
              $sosptronggio += $sp['Amount'];
            }
            ?>
            <li class="get-started">
              <a href="<?=SITE_URL?>/?act=cartview">
                Giỏ hàng
                <?php if ($sosptronggio == 0) { ?> 
                  <i class="fas fa-shopping-cart"></i> 
                <?php } else { ?>
                  <span class="badge bg-success"><?=$sosptronggio?></span> 
                <?php } ?></a>   
              </a>
            </li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>Đại lý di động uy tín</h1>
      <h2>Chúng tôi có giá tốt nhất cho những sản phẩm hoàn thiện</h2>
      <a href="#about" class="btn-get-started scrollto">Khám phá</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <?php if (file_exists($viewFile)) require_once "$viewFile";?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Bán điện thoại</h3>
            <p>  
            Toà nhà Innovation, <br>
            lô 24, Công viên phần mềm Quang Trung, <br>
            Q. 12, TP. HCM. <br><br>
              <strong>Phone:</strong> +9 65 28 60 66<br>
              <strong>Email:</strong> longnh@fpt.edu.vn<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Liên kết</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Trang chủ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Về chúng tôi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Dịch vụ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Chính sách bảo mật</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Dịch vụ của chúng tôi</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Điện thoại</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sửa điện thoại</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Chính sách đổi trả</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Đổi cũ lấy mới</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Nhập Email của bạn</h4>
            <p>Bạn sẽ nhận được thông báo về sản phẩm mới hay các ưu đãi hữu ích và sớm nhất</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Bán điện thoại</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
          
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <!-- Vendor JS Files -->
  

  <script src="Bethany/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Bethany/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="Bethany/assets/vendor/php-email-form/validate.js"></script>
  <script src="Bethany/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="Bethany/assets/vendor/counterup/counterup.min.js"></script>
  <script src="Bethany/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="Bethany/assets/vendor/venobox/venobox.min.js"></script>
  <script src="Bethany/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="Bethany/assets/vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="Bethany/assets/js/main.js"></script>
  
<script src="js/main.js"></script>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

