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

    function getAllThucPham() {
      echo json_encode('ok ok');
    }

    function index()
    {

    }

    function edit()
    {

    }

    function update()
    {

    }

    function delete()
    {

    }
} //class nhasanxuat
