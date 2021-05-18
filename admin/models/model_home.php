<?php
    session_start();
    require_once '../system/model_system.php';
    class model_home extends model_system {
        function checkuser($taikhoan, $pass){
            $sql = "SELECT * from users where username='$taikhoan' and password='$pass' and vaitro=1";
            return $this->queryOne($sql);
        }
 }//class
?>
