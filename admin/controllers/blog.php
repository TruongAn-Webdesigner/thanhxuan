<?php
    session_start();
    require_once("../system/config.php");
    require_once "models/model_blog.php"; //nạp model để có các hàm tương tác db

    class blog {
        function __construct()   {
        $this->model = new model_blog();

        $act = "index";//chức năng mặc định
        if(isset($_GET["act"])==true) $act=$_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {
                case "index": $this->index(); break;
                case "addnew": $this->addnew(); break;
                case "store": $this->store(); break;
                case "edit": $this->edit(); break;
                case "update": $this->update(); break;
                case "delete": $this->delete(); break;

            }
        //$this->$act;
        }
        function index() {
          $page_title = "Danh sách blog";
          $page_file = "views/blog_index.php";
          require_once "layout.php";
        }
        function addnew() {
          $page_title = "Thêm Blog mới";
          $page_file = "views/blog_addnew.php";
          require_once "layout.php";
        }
        function store() {

        }
        function edit() {

        }
        function update(){

        }
        function delete(){

        }
    } //class nhasanxuat
?>
