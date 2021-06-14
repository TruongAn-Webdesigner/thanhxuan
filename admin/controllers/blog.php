<?php

require_once("../system/config.php");
require_once "models/model_blog.php"; //nạp model để có các hàm tương tác db

class blog
{
  function __construct()
  {
    $this->model = new model_blog();

    $act = "index"; //chức năng mặc định
    if (isset($_GET["act"]) == true) $act = $_GET["act"]; //tiếp nhận chức năng user request
    switch ($act) {
      case "index":
        $this->index();
        break;
      case "duyet":
        $this->duyet();
        break;
      case "addnew":
        $this->addnew();
        break;
      case "detail":
        $this->detail();
        break;
      case "edit":
        $this->edit();
        break;
      case "update":
        $this->update();
        break;
      case "delete":
        $this->delete();
        break;
    }
    //$this->$act;
  }
  function index()
  {
    $page_title = "Danh sách blog";
    $page_file = "views/blog_tin.php";
    $list = $this->model->listTin();
    require_once "layout.php";
  }
  function duyet()
  {
    $idTin = $_GET['id'];
    $this->model->duyet($idTin);
    $this->index();
  }
  function addnew()
  {
    $page_title = "Thêm Blog mới";
    $page_file = "views/blog_addnew.php";
    require_once "layout.php";
  }
  function detail()
  {
    $idTin = $_GET['id'];
    $list = $this->model->chitiet($idTin);
    $page_title = "Chi tiết";
    $page_file = "views/detail.php";
    require_once "layout.php";
  }
  function edit()
  {
    $idTin = $_GET['id'];
    $list = $this->model->chitiet($idTin);
    $page_title = "Sửa tin";
    $page_file = "views/edit_tin.php";
    require_once "layout.php";
  }
  function update()
  {
    $TieuDe     = trim(strip_tags($_POST['TieuDe']));
    $TomTat     = trim(strip_tags($_POST['TomTat']));
    $Content    = trim(strip_tags($_POST['Content']));
    $idLT       = $_POST['idLT'];
    $idTin      = $_POST['idTin'];
    $Ngay       = $_POST['Ngay'];
    $AnHien      = $_POST['AnHien'];
    $NoiBat     = $_POST['NoiBat'];
    $imgNew     = $_FILES['img-new'];
    
    if ($imgNew == '') {
        $image = $_POST['img-old'];
        echo $image;
        exit();
    } else {        
        $urlHinh = $_FILES["img-new"];
        echo $urlHinh;
        echo $imgNew;
        exit();
        $urlHinhA = "uploads/images/$urlHinh";
        move_uploaded_file($_FILES["urlHinh"]["tmp_name"], "../uploads/images/$urlHinh");
    }
    
    $this->model->updateTin($TieuDe, $idTin, $TomTat, $Content, $idLT, $Ngay, $AnHien, $NoiBat);
    $list = $this->model->chitiet($idTin);
    $page_title = "Chi tiết";
    $page_file = "views/detail.php";
    require_once "layout.php";
  }
  function delete()
  {
    $idTin = $_GET['id'];
    $this->model->xoa($idTin);
    $this->index();
  }
} //class nhasanxuat
