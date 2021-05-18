<?php
require_once "models/model_home.php"; //nạp model để có các hàm tương tác db
require_once "../admin/models/model_blog.php"; 

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
            case "home":$this->home();break;
        }
        //$this->$act;
    }

    public function home()
    {

    }

} //class home
