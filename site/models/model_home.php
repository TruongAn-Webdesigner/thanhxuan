<?php
  require_once '../system/model_system.php';
  class model_home extends model_system {
    function listTin()
    {
        $sql = "SELECT * FROM tin ORDER BY idTin Desc";
        $kq = $this->query($sql);
        return $kq;
    }
    function listTinSL($sl)
    {
        $sql = "SELECT * FROM tin  ORDER BY Ngay Desc Limit 0,$sl ";
        $kq = $this->query($sql);
        return $kq;
    }
    function listLoaiTin()
    {
        $sql = "SELECT * FROM loaitin";
        $kq = $this->query($sql);
        return $kq;
    }
    function duyet($idTin)
    { {
            try {
                $sql = "UPDATE tin SET Duyet='1' WHERE idTin='$idTin'";
                $this->execute($sql);
            } catch (Exception  $e) {
                print_r($e->errorInfo);
                exit();
            }
        }
    }
    function xoa($idTin)
    {
        $sql = "DELETE FROM tin WHERE idTin='$idTin'";
        $this->execute($sql);
    }
    function chitiet($idTin)
    {
        $sql = "SELECT * FROM tin WHERE idTin='$idTin'";
        return $this->queryOne($sql);
    }
    function updateTin($TieuDe,$idTin, $TomTat, $Content, $idLT, $Ngay, $AnHien, $NoiBat)
    {
        try {
            $sql = "UPDATE tin SET TieuDe='$TieuDe',TomTat='$TomTat',Content='$Content',idLT=' $idLT',Ngay='$Ngay',AnHien='$AnHien',NoiBat=' $NoiBat' WHERE idTin='$idTin'";
            $this->execute($sql);
        } catch (Exception  $e) {
            print_r($e->errorInfo);
            exit();
        }
    }
  }//class
