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
            case "signup":
                $this->signup();
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
            case "addnew":
                $this->addnew();
                break;
                // case "detail":$this->detail();break;
            case "blogdetail":
                $this->blogdetail();
                break;
            case "comment";
            case "thucdon":
                $this->thucdon();
                break;
            case "getAllFood":
                $this->getAllFood();
                break;
            case "getBlog":
                $this->getBlog();
                break;
            case "addComment":
                $this->addComment();
                break;
        }
        //$this->$act;
    }

    public function home()
    {

        $page_file = "views/home.php";
        require_once "layout.php";
    }

    public function signup(){
        $hotennew = trim(strip_tags($_POST['taoten']));
        $tknew = trim(strip_tags($_POST['taotk']));
        $passnew = trim(strip_tags($_POST['taopw']));;

        $this->model->addNewAcc($tknew, $passnew, $hotennew);
        $this->login();
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
            $this->index();
        } else {
            $erro = 1;
            $this->login();
        }
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
        $foodBlogId       = 3;
        $heathyBlogId     = 2;
        $sportsBlogId     = 4;
        $mentalityBlogId  = 1;

        $getTheLatestPost = $this->model->getTheLatestPost();
        $foodBlog         = $this->model->getblog($foodBlogId);
        $heathyBlog       = $this->model->getblog($heathyBlogId);       
        $sportsBlog       = $this->model->getblog($sportsBlogId);
        $mentalityBlog    = $this->model->getblog($mentalityBlogId);
        $listHead         = $this->model->getheaderBlog();
        $blogNoiBat       = $this->model->getBlogNoiBat();
        $page_file = "views/blog.php";
        // $cssFile = 'abc.css';
        require_once "layout.php";
    }
    public function  addnew()
    {
        if(isset($_SESSION['user']) == true){
            $tenuser = $_SESSION['user'];
            $iduser = $this->model->inforUser($tenuser);
       
            $TieuDe = trim(strip_tags($_POST['TieuDe']));
            $Content = $_POST['NoiDung'];
            $TomTat = trim(strip_tags($_POST['TomTat']));
            $idLT = $_POST['idLT'];
            $Ngay = date('Y-m-d');
            $AnHien = 0;
            $NoiBat = 0;

            $NguoiDang = $_SESSION['user'];
            
            $urlHinh = $_FILES["urlHinh"]["name"];
            $urlHinhA = "uploads/images/$Ngay-$urlHinh";
            move_uploaded_file($_FILES["urlHinh"]["tmp_name"], "../uploads/images/$Ngay-$urlHinh");

            $this->model->addnewTin($TieuDe, $Content, $TomTat, $iduser[0], $idLT, $Ngay, $AnHien, $NoiBat, $urlHinhA, $NguoiDang);
            header('location:index.php');
        }
    }
    public function blogdetail()
    {
        if(isset($_SESSION['user']) == true){
            $tenuser = $_SESSION['user'];
            $layinfor = $this->model->inforUser($tenuser);
        }
        $id = $_GET['id'];
        $blogNoiBat       = $this->model->getBlogNoiBat();

        $blogById = $this->model->chitiet($id);        
        $comment = $this->model->getCommentByIdBlog($blogById['0']);        
        
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

    public function getBlog() 
    {
        $idlt = $_GET['idlt'];
        $from = $_GET['from'];
        
        $blog = $this->model->getMoreBlogs($idlt, $from);
        echo json_encode($blog->fetchAll());        
    }

    public function addComment() 
    {
        $noidungcomment = trim(strip_tags($_POST['noidungcomment']));
        $iduser = $_POST['iduser'];
        $idtin = $_POST['idtin'];
        $datetime = $_POST['datetime'];

        $this->model->addBlogComment($noidungcomment, $iduser, $idtin, $datetime);
        $lastBlog = $this->model->getLastBlog();
        
        echo json_encode($lastBlog);
    }
}   
