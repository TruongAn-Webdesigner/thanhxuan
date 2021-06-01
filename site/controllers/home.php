<?php
require_once "models/model_home.php"; //nạp model để có các hàm tương tác db
// require_once "../admin/models/model_blog.php";

class home
{
    public function __construct()
    {
        $this->model = new model_home();

        $act = "home"; //chức năng mặc định
        if (isset($_GET["act"]) == true) {
            $act = $_GET["act"];
        }
        //chức năng user request
        switch ($act) {
            case "home":
                $this->home();
                break;
            case "login":
                $this->login();
                break;
            case "logout":
                $this->logout();
                break;
            case "check_form_login":
                $this->check_form_login();
                break;
            case "blog":
                $this->blog();
                break;
                // case "detail":$this->detail();break;
            case "blogDetail":
                $this->blogDetail();
                break;
            case "thucdon":
                $this->thucdon();
                break;
            case "getAllFood":
                $this->getAllFood();
                break;
        }
        //$this->$act;
    }

    public function home()
    {

        $page_file = "views/home.php";
        require_once "layout.php";
    }

    function login()
    {
        require "views/login.php";
    }
    function check_form_login()
    {
        $tentk = trim(strip_tags($_POST['taikhoan']));
        $matkhau = trim(strip_tags($_POST['pass']));
        // if (isset($_POST['nhomatkhau']) == true) $nhomatkhau = $_POST['nhomatkhau'];
        if ($this->model->dangnhap($tentk, $matkhau) == true) {
           
            $_SESSION['user'] = $tentk;
            header('location:index.php');
        } else {
            $erro = 1;
            header('location:index.php');
        }
        $this->index();
    }

    function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']); // xóa session login
        }
        $this->blog();
    }

    public function thucdon()
    {
        $page_file = "views/thucdon.php";
        require_once "layout.php";
    }

    public function blog()
    {
        $list = $this->model->chitiet(1);

        $list3 = $this->model->listTinSL(3);

        $page_file = "views/blog.php";
        require_once "layout.php";
    }

    public function blogdetail()
    {
        // $list = $this->model->listLoaitin();
        $page_file = "views/blogchitiet.php";
        require_once "layout.php";
    }

    public function getAllFood()
    {
        $array = array();
        $pdoQuery = $this->model->getAllFood();

        // var_dump($pdoQuery->fetchAll()); exit();

        $a = $pdoQuery->fetchAll();

        foreach ($pdoQuery as $item) {
            $array[] = $item;
        }
        echo json_encode($a);
    }
} //class home
