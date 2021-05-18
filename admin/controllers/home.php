<?php
    session_start();
    require_once("../system/config.php");
    require_once "models/model_home.php"; //nạp model để có các hàm tương tác db
    class home {
        function __construct() {
        $this->model = new model_home();
        $act = "index";//chức năng mặc định
        if(isset($_GET["act"])==true) $act=$_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {
                case "index": $this->index(); break;
                case "edit": $this->edit(); break;
                case "update": $this->update(); break;
                case "delete": $this->delete(); break;
                case "login": $this->login(); break;
                case "logout": $this->logout(); break;
                case "check_form_login": $this->check_form_login(); break;
        }
        //$this->$act;
        }
        function index() {
            $page_title = "Danh sách blog";
            $page_file = "views/blog_index.php";
            require_once "layout.php";
        }
        function login(){
            require "views/login.php";
        }
        function check_form_login() {
            if (isset($_POST['taikhoan'])==true) $taikhoan = $_POST['taikhoan'];
            if (isset($_POST['pass'])==true) $pass = $_POST['pass'];
            if (isset($_POST['nhomatkhau'])==true) $nhomatkhau = $_POST['nhomatkhau'];
            $row = $this->model->checkuser($taikhoan, $pass);
            if ($row != null) {
                $_SESSION['admin']=$taikhoan;
                $_SESSION['nameadmin']=$row['hoten'];
                header("location: http://localhost:80/suckhoexuan/admin/?ctrl=home");
                exit();
            } else {
                $erro = 1;
                require "views/login.php";
            }
        }
        function logout(){
            if (isset($_SESSION['admin']))
            {
                unset($_SESSION['admin']); // xóa session login
            }
            require "views/login.php";
        }
        function edit(){
            if (isset($_GET['idNSX'])==true)
            $idNSX = $_GET['idNSX'];
            settype($idNSX, "int");
            $row = $this->model->detailrecordNSX($idNSX);
            $page_title = "Cập nhật nhà sản xuất.";
            $page_file = "views/nhasanxuat_edit.php";
            require_once "layout.php";
        }
        function update(){
            if(isset($_GET['idNSX'])==true) $idNSX = $_GET['idNSX'];
            if(isset($_POST['TenNSX'])==true) $TenNSX = $_POST['TenNSX'];
            if(isset($_POST['ThuTu'])==true) $ThuTu = $_POST['ThuTu'];
            if(isset($_POST['AnHien'])==true) {
                $AnHien = $_POST['AnHien'];
            } else {
                $AnHien = 0;
            }
            $this->model->update($idNSX, $TenNSX, $ThuTu, $AnHien);
            $list = $this->model->listrecordsNSX();
            header('Location: ?ctrl=nhasanxuat&act=index');
            exit();
        }
        function delete(){
            if (isset($_GET['id'])==true) $id = $_GET['id'];
            settype($id, "int");
            if (isset($_GET['index'])==1) { // index = 1 thì xóa
                $row = $this->model->deleteNSX($id);
                header("location: " . ADMIN_URL . "/?ctrl=nhasanxuat");
            } else { // nếu bấm xác nhận thì index bằng 1
                if (isset($_GET['tenNSX'])==true) $ten = $_GET['tenNSX'];
                $ctr = 'nhasanxuat';
                $ac = "Xóa";
                $noidung = "Xác nhận xóa";
                $page_title = "Thông báo";
                $page_file = "views/thongbao.php";
                require_once "layout.php";
            }
        }
    } //class nhasanxuat
?>
