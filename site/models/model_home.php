<?php
  require_once '../system/model_system.php';
  class model_home extends model_system {
    function sanphamMoi($page_num, $page_size) {
      $start_row = ($page_num - 1) * $page_size;
      $sql = "SELECT dt.iddt, dt.tendt, dt.gia, dt.giakm, dt.urlhinh, dt.Thoidiemnhap, dt.mota, dt.solanxem, dt.solanmua, dt.hot, dt.idnsx, dt.anhien, dt.soluongtonkho, dt.idnsx, nsx.tennsx FROM dienthoai dt inner join nhasanxuat nsx on nsx.idnsx = dt.idnsx WHERE dt.anhien=1 ORDER BY Thoidiemnhap DESC LIMIT $start_row, $page_size";
      $kq= $this->query($sql);
      return $kq;
    }

    function spmoi() {
      $sql = "SELECT dt.iddt, dt.tendt, dt.gia, dt.giakm, dt.urlhinh, dt.Thoidiemnhap, dt.mota, dt.solanxem, dt.solanmua, dt.hot, dt.idnsx, dt.anhien, dt.soluongtonkho, dt.idnsx, nsx.tennsx FROM dienthoai dt inner join nhasanxuat nsx on nsx.idnsx = dt.idnsx WHERE dt.anhien=1 ORDER BY Thoidiemnhap DESC LIMIT 3";
      $kq= $this->query($sql);
      return $kq;
    }

    function spxemnhieu() {
      $sql = "SELECT dt.iddt, dt.tendt, dt.gia, dt.giakm, dt.urlhinh, dt.Thoidiemnhap, dt.mota, dt.solanxem, dt.solanmua, dt.hot, dt.idnsx, dt.anhien, dt.soluongtonkho, dt.idnsx, nsx.tennsx FROM dienthoai dt inner join nhasanxuat nsx on nsx.idnsx = dt.idnsx WHERE dt.anhien=1 ORDER BY solanxem DESC LIMIT 3";
      $kq= $this->query($sql);
      return $kq;
    }

    function spbanchay() {
      $sql = "SELECT dt.iddt, dt.tendt, dt.gia, dt.giakm, dt.urlhinh, dt.Thoidiemnhap, dt.mota, dt.solanxem, dt.solanmua, dt.hot, dt.idnsx, dt.anhien, dt.soluongtonkho, dt.idnsx, nsx.tennsx FROM dienthoai dt inner join nhasanxuat nsx on nsx.idnsx = dt.idnsx WHERE dt.anhien=1 ORDER BY solanmua DESC LIMIT 3";
      $kq= $this->query($sql);
      return $kq;
    }

    function sanphammoitheoidnsx($page_num, $page_size, $idnsx) {
      $start_row = ($page_num - 1) * $page_size;
      $sql = "SELECT dt.iddt, dt.tendt, dt.gia, dt.giakm, dt.urlhinh, dt.Thoidiemnhap, dt.mota, dt.solanxem, dt.solanmua, dt.hot, dt.idnsx, dt.anhien, dt.soluongtonkho, dt.idnsx, nsx.tennsx FROM dienthoai dt inner join nhasanxuat nsx on nsx.idnsx = dt.idnsx WHERE nsx.idnsx = $idnsx and dt.anhien=1 ORDER BY Thoidiemnhap DESC LIMIT $start_row, $page_size";
      $kq= $this->query($sql);
      return $kq;
    }

    function countPDbynsx($idnsx) {
      $sql="SELECT count(*) as sodong  FROM dienthoai where idnsx=$idnsx";
      return $this->queryOne($sql);
    }

    function detail($id){
        $sql = "SELECT * FROM dienthoai WHERE anhien=1 AND iddt=$id";
        $kq= $this->query($sql);
        if (!$kq) return FALSE;
        $row = $kq -> fetch();
        return $row;
    }
    function thuoctinhdt($id=0){
          $sql = "SELECT * FROM thuoctinhdt WHERE iddt=$id";
          $kq= $this->query($sql);
          if (!$kq) return FALSE;
          $row = $kq -> fetch();
          return $row;
    }
    function sanphamtheoNSX($idNSX=0){
      $sql = "SELECT * FROM dienthoai WHERE anhien=1 AND idnsx=$idNSX
              ORDER BY Thoidiemnhap DESC";
      $kq= $this->query($sql);
      return $kq;
    }
    function nhasanxuat() {
      $sql = "SELECT * FROM nhasanxuat";
      $kq= $this->query($sql);
      return $kq;
    }
    function getnhasanxuatbykey($key) {
      $sql = "SELECT * FROM nhasanxuat where tennsx like '%$key%'";
      $kq= $this->queryOne($sql);
      return $kq;
    }

    function tangluocxem($id) {
      $sql = "UPDATE `dienthoai` SET `solanxem` = `solanxem` + 1 WHERE `dienthoai`.`iddt` = $id";
      $kq= $this->execute($sql);
      return $kq;
    }

    function getallbinhluan($id) {
      $sql = "SELECT * FROM binhluan bl INNER JOIN users us on bl.iduser = us.iduser where iddt='$id' and bl.anhien = 1 order by thoidiembl desc";
      $kq= $this->query($sql);
      return $kq;
    }
    function dembl($id) {
      $sql = "SELECT count(bl.idbl) as 'sobinhluan' FROM binhluan bl INNER JOIN users us on bl.iduser = us.iduser where iddt='$id' and bl.anhien = 1 order by thoidiembl desc";
      $kq= $this->queryOne($sql);
      return $kq;
    }

    function checkusersite($taikhoan){
      $sql = "SELECT * from users where username='$taikhoan'";
      return $this->queryOne($sql);
    }

    function checkemail($email){
      $sql = "SELECT * from users where email='$email'";
      return $this->queryOne($sql);
    }

    function adduser($username, $password, $hoten, $email) {
      $sql = "INSERT INTO `users` (`iduser`, `username`, `password`, `hoten`, `kichhoat`, `email`, `vaitro`, `anhien`) VALUES (NULL, '$username', '$password', '$hoten', 0, '$email', '0', '1');";
      $this->execute($sql);
    }

    function kichhoatuser($username, $password) {
      $sql = "UPDATE `users` SET `kichhoat` = '1' where username='$username' and password = '$password'";
      $this->execute($sql);
    }

    function luudonhangnhe($idDH, $ht, $email, $sdt, $diachi, $ghichu, $phuongthuctt, $phuongthucgh, $tongtien){
      if ($idDH==-1){
        $sql = "INSERT INTO donhang SET tennguoinhan='$ht', emailnguoinhan='$email'," . "thoidiemdathang=Now(), anhien=1, dienthoainguoinhan='$sdt', diachinguoinhan='$diachi', ghichucuakhach='$ghichu', phuongthucthanhtoan=$phuongthuctt, phuongthucgiaohang=$phuongthucgh, tongtienhoadon=$tongtien";
        $kq= $this->query($sql);
        if (!$kq) return FASLSE;
        else return $this->conn->lastInsertId();
      } else {
        $sql = "UPDATE donhang SET tennguoinhan='$ht', emailnguoinhan='$email'," . "thoidiemdathang=Now(), anhien=1, dienthoainguoinhan='$sdt', diachinguoinhan='$diachi', ghichucuakhach='$ghichu' where iddh=$idDH, phuongthucthanhtoan=$phuongthuctt, phuongthucgiaohang=$phuongthucgh, tongtienhoadon=$tongtien";
        $kq= $this->query($sql);
        if (!$kq) return FASLSE;
        else return $idDH;
        }
    }//function luudonhangnh

    function luugiohangnhe($idDH, $giohang){
      $sql = "DELETE FROM donhangchitiet WHERE idDH='$idDH'";
      $this->query($sql);
      foreach ($giohang as $idDT=>$dt){
        $tenDT = $dt['TenDT'];
        $gia= $dt['Gia'];
        $urlhinh= $dt['urlhinh'];
        $Amount= $dt['Amount'];
        $sql = "INSERT INTO donhangchitiet SET iddh='$idDH', iddt= '$idDT', " . "tendt='{$tenDT}', gia='{$gia}', soluong='$Amount', urlhinh='$urlhinh'";
        $sql1 = "UPDATE `dienthoai` SET  `solanmua` = solanmua + $Amount, `soluongtonkho` = soluongtonkho - $Amount WHERE `dienthoai`.`iddt` = $idDT";
        $kq= $this->query($sql);
        $kq1= $this->query($sql1);
      }//foreach
    }

    function doipass($pass, $email) {
      $sql = "UPDATE `users` SET `password` = '$pass' WHERE `email` = '$email'";
      $this->execute($sql);
    }

    function infobyusername($username) {
      $sql = "SELECT * from users where username='$username'";
      return $this->queryOne($sql);
    }
  }//class
?>
