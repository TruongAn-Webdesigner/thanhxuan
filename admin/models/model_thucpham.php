<?php
require_once '../system/model_system.php';
class model_thucpham extends model_system
{

    function getAllThucPham()
    {
        $sql = "SELECT * FROM thucpham ORDER BY id Desc";
        $kq = $this->query($sql);
        return $kq;
    }
    function thucpham($id)
    {
        $sql = "SELECT * FROM thucpham WHERE id='$id'";
        return $this->queryOne($sql);
    }
    function updateThucpham($id,$ten,$protein,$fat,$carb,$calo,$mota,$anhien)
    {
        try {
            $sql = "UPDATE thucpham SET ten='$ten', protein='$protein', fat='$fat',carb='$carb',calo='$calo',mota='$mota',anhien='$anhien' WHERE id='$id'";
            $this->execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
    function xoaThucpham($id)
    {
        $sql = "DELETE FROM thucpham WHERE id='$id'";
        $this->execute($sql);
    }
    function addThucpham($ten,$protein,$fat,$carb,$calo,$mota,$anhien)
    { 
        $sql = "insert into thucpham (ten, protein, fat, carb, calo,mota,anhien)
                values('$ten','$protein', '$fat', '$carb','$calo','$mota','$anhien')";
        $this->execute($sql);
    }
}
?>
