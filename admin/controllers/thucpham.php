<?php

require_once("../system/config.php");
require_once "models/model_thucpham.php"; //nạp model để có các hàm tương tác db
class thucpham
{
    function __construct()
    {
        $this->model = new model_thucpham();
        $act = "index"; //chức năng mặc định
        if (isset($_GET["act"]) == true) $act = $_GET["act"]; //tiếp nhận chức năng user request
        switch ($act) {
            case "index":
                $this->index();
                break;
            case "edit":
                $this->edit();
                break;
            case "addnew":
                 $this->addnew();
                break;
            case "update":
                $this->update();
                break;
            case "delete":
                $this->delete();
                break;
            case "getAllThucPham":
              $this->getAllThucPham();
              break;
        }
        //$this->$act;
    }

    function addnew() 
    {
        $ten = trim(strip_tags($_POST['ten']));
        $protein = $_POST['protein'];
        settype($protein, "float");

        $fat = $_POST['fat'];
        settype($fat, "float");

        $carb = $_POST['carb'];
        settype($carb, "float");

        $calo = $_POST['calo'];
        settype($calo, "float");
        
        $mota = $_POST['mota'];
        $anhien = $_POST['anhien'];
        settype($anhien, "int");
        $this->model->addThucpham($ten,$protein,$fat,$carb,$calo,$mota,$anhien);
        $this->index();
    }

    function index()
    {
        $list = $this->model->getAllThucPham();
        $page_title = "Danh sách thực phẩm";
        $page_file = "views/thucpham_index.php";
        require_once "layout.php";
    }

    function edit()
    {
        $id = $_GET['id'];
        $list = $this->model->thucpham($id);
        $page_title = "Sửa thực phẩm";
        $page_file = "views/thucpham_edit.php";
        require_once "layout.php";
    }

    function update()
    {
        $id = $_POST['id'];
        $ten = trim(strip_tags($_POST['ten']));
        $protein = $_POST['protein'];
        settype($protein, "int");
        $fat = $_POST['fat'];
        settype($fat, "int");
        $carb = $_POST['carb'];
        settype($carb, "int");
        $calo = $_POST['calo'];
        settype($calo, "int");
        $mota = $_POST['mota'];
        $anhien = $_POST['anhien'];
        settype($anhien, "int");
        $this->model->updateThucpham($id,$ten,$protein,$fat,$carb,$calo,$mota,$anhien);
        $this->index();
    } 

    function delete()
    {
        $id = $_GET['id'];
        $this->model->xoaThucpham($id);
        $this->index();
    }
} //class nhasanxuat
