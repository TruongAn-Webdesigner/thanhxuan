<?php
require_once '../../../system/model_system.php';
class model_food extends model_system
{

    function getAllThucPham()
    {
        $sql = "";
        $kq = $this->query($sql);
        return $kq;
    }
}
?>
