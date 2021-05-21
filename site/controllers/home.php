<?php
// require_once "models/model_home.php"; //nạp model để có các hàm tương tác db
// require_once "../admin/models/model_blog.php";

class home
{
    public function __construct()
    {
        // $this->model = new model_home();

        $act = "home"; //chức năng mặc định
        if (isset($_GET["act"]) == true) {
            $act = $_GET["act"];
        }
        //chức năng user request
        switch ($act) {
            case "home":$this->home();break;
            case "blog":$this->blog();break;
            case "blogDetail":$this->blogDetail();break;

        }
        //$this->$act;
    }

    public function home()
    {
        // $list = $this->model->listLoaitin();
        $page_file = "views/home.php";
        require_once "layout.php";
    }

    public function blog()
    {
        // $list = $this->model->listLoaitin();
        $page_file = "views/blog.php";
        require_once "layout.php";
    }

    public function blogdetail()
    {
        // $list = $this->model->listLoaitin();
        $page_file = "views/blogchitiet.php";
        require_once "layout.php";
    }

} //class home
