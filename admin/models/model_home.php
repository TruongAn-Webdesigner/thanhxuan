<?php
require_once '../system/model_system.php';
class model_home extends model_system
{

    function dangnhap($tentk, $matkhau)
    {
        $sql = "SELECT count(*) as sodong FROM users WHERE username='$tentk' and password='$matkhau' and vaitro='0'";
        $kq = $this->query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function listLoaitin()
    { //hàm lấy các record trong table

        $sql = "SELECT * FROM loaitin";
        $kq = $this->query($sql);
        return $kq;
    }
    
}
