<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

    <!-- code login cũ -->
        <!-- <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                      
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> ĐĂNG NHẬP</h1>
                                    </div>
                                    <form class="user" method="POST" action="/thanhxuan/site/?act=check_form_login">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="taikhoan" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập tài khoản...">
                                            <div>   </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="pass" id="exampleInputPassword" placeholder="Nhập password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div style="color: red; display: none; <?php if (isset($erro) == true) echo 'display: block;' ?>">Mật khẩu hoặc tài khoản không đúng</div>
                                                <input type="checkbox" class="custom-control-input" name="nhomatkhau" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Nhớ mật khẩu</label>
                                            </div>
                                        </div>                                       
                                            <button type="submit" value="Submit" class="btn btn-primary btn-user btn-block">
                                            Đăng nhập
                                            </button>                                        
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Quên mật khẩu?</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div> -->
    <!-- code lohin cũ -->

        <!-- code login mới-->
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form method="POST" action="/thanhxuan/site/?act=signup">
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" name="taoten" placeholder="Name" />
                    <input type="text" name="taotk" placeholder="Email" />
                    <input type="password" name="taopw" placeholder="Password" />
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form class="user" method="POST" action="/thanhxuan/site/?act=check_form_login">
                    <!-- action đây -->
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input type="text" name="taikhoan" placeholder="Email" /> <!-- tài khoản -->
                    <input type="password" name="pass" placeholder="Password" /> <!-- mật khẩu -->
                    <div class="form-group">
                        <!-- phần ghi nhớ và hiện lỗi -->
                        <div class="custom-control custom-checkbox small">
                            <div style="color: red; display: none; <?php if (isset($erro) == true) echo 'display: block;' ?>">Mật khẩu hoặc tài khoản không đúng</div>
                            <input type="checkbox" class="custom-control-input" name="nhomatkhau" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Nhớ mật khẩu</label>
                        </div>
                    </div>

                    <a href="#">Forgot your password?</a>
                    <button>Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /code login mới-->
        
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>

    <!-- file js login -->
    <script src="js/login.js"></script>

</body>

</html>