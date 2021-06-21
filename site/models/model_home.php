<?php
  require_once '../system/model_system.php';
  class model_home extends model_system {
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

    function doipass($pass, $email) {
      $sql = "UPDATE `users` SET `password` = '$pass' WHERE `email` = '$email'";
      $this->execute($sql);
    }

    function infobyusername($username) {
      $sql = "SELECT * from users where username='$username'";
      return $this->queryOne($sql);
    }

    function getAllFood() {
      $sql = "SELECT * FROM `thucpham` WHERE anhien = 1 ORDER BY ten ASC";
      return $this->query($sql);
    }
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
    function listTinTL($sl)
    {
        $sql = "SELECT * FROM tin  Where idLT='1' ORDER BY Ngay Desc Limit 0,$sl ";
        $kq = $this->query($sql);
        return $kq;
    }
    function listTinSK($sl)
    {
        $sql = "SELECT * FROM tin  Where idLT='2' ORDER BY Ngay Desc Limit 0,$sl ";
        $kq = $this->query($sql);
        return $kq;
    }

    function listTinTapLuyen($sl) {
        $sql = "SELECT * FROM tin  Where idLT='4' ORDER BY Ngay Desc Limit 0,$sl ";
        $kq = $this->query($sql);
        return $kq;
    }
    function listTinBA($sl)
    {
        $sql = "SELECT * FROM tin  Where idLT='3' ORDER BY Ngay Desc Limit 0,$sl ";
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
        $sql = "SELECT t.idTin, t.lang, t.TieuDe, t.TomTat, t.urlHinh, t.Ngay, t.idUser, t.Content, t.SoLanXem, t.NoiBat, t.AnHien, t.tags, us.hoten 
                FROM `tin` t INNER JOIN users us on t.idUser = us.idUser 
                WHERE t.idTin = $idTin"; 
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

    function dangnhap($tentk, $matkhau)
    {
        $sql = "SELECT count(*) as sodong FROM users WHERE username='$tentk' and password='$matkhau'";
        $kq = $this->query($sql);
        $row = $kq->fetch();
        $rowcount = $row['sodong'];
        return $rowcount > 0;
    }
    function addnewTin($TieuDe, $Content, $TomTat, $iduser, $idLT, $Ngay, $AnHien, $NoiBat, $urlHinhA, $NguoiDang)
    { 
        $sql = "insert into Tin (TieuDe, Content, TomTat, idUser,idLT, Ngay,AnHien,NoiBat,urlHinh,NguoiDang)
                values('$TieuDe','$Content', '$TomTat', '$iduser','$idLT','$Ngay','$AnHien','$NoiBat','$urlHinhA','$NguoiDang')";
        $this->execute($sql);
    }

    function addNewAcc($tknew, $passnew, $hotennew)
    {
      $sql = "insert into users (username, password, hoten)
              values('$tknew', '$passnew', '$hotennew')";
      $this->execute($sql);
    }

    function getTheLatestPost() {
        $sql = "SELECT t.idTin, t.lang, t.TieuDe, t.TomTat, t.urlHinh, t.Ngay, t.idUser, t.Content, t.SoLanXem, t.NoiBat, t.AnHien, t.tags, us.hoten 
        FROM `tin` t INNER JOIN users us on t.idUser = us.idUser 
        WHERE t.Duyet = 1
        ORDER BY Ngay desc LIMIT 1";
        return $this->queryOne($sql);
    }

    function getblog($idlt) {
        $sql = "SELECT t.idTin, t.lang, t.TieuDe, t.TomTat, t.urlHinh, t.Ngay, t.idUser, t.Content, t.SoLanXem, t.NoiBat, t.AnHien, t.tags, us.hoten 
        FROM `tin` t INNER JOIN users us on t.idUser = us.idUser 
        WHERE t.idLT = $idlt AND t.Duyet = 1 ORDER BY Ngay DESC LIMIT 4";
        return $this->query($sql);
    }

    function getheaderBlog() {
        $sql = "SELECT t.idTin, t.lang, t.TieuDe, t.TomTat, t.urlHinh, t.Ngay, t.idUser, t.Content, t.SoLanXem, t.NoiBat, t.AnHien, t.tags, us.hoten 
        FROM `tin` t INNER JOIN users us on t.idUser = us.idUser WHERE t.Duyet = 1
        ORDER BY Ngay desc LIMIT 1, 3";
        return $this->query($sql);
    }

    function getMoreBlogs($idlt, $from) {
        $sql = "SELECT t.idTin, t.lang, t.TieuDe, t.TomTat, t.urlHinh, t.Ngay, t.idUser, t.Content, t.SoLanXem, t.NoiBat, t.AnHien, t.tags, us.hoten 
        FROM `tin` t INNER JOIN users us on t.idUser = us.idUser 
        WHERE t.idLT = $idlt AND t.Duyet = 1 ORDER BY Ngay DESC LIMIT $from, 4";
        return $this->query($sql);
    }

    function inforUser($tenuser){
      $sql = "select idUser from users where username='$tenuser'";
      return $this->queryOne($sql);
    }

    function addBlogComment($noidungcomment, $iduser, $idtin, $datetime) {
      $sql = "INSERT INTO `comment` (`idtin`, `idUser`, `noidung`, `ngaygio`) 
              VALUES ('$idtin', '$iduser', '$noidungcomment', '$datetime')";
      $this->execute($sql);      
    }

    function getLastBlog() {
      $sql = "SELECT * FROM `comment` ORDER BY id DESC limit 1";
      return $this->queryOne($sql);
    }

    function getCommentByIdBlog($idTin) {
      $sql = "SELECT * FROM `comment` WHERE idtin = $idTin ORDER BY ngaygio DESC LIMIT 5";
      return $this->query($sql);
    }

    function getBlogNoiBat() {
        $sql = "SELECT t.idTin, t.lang, t.TieuDe, t.TomTat, t.urlHinh, t.Ngay, t.idUser, t.Content, t.SoLanXem, t.NoiBat, t.AnHien, t.tags, us.hoten 
        FROM `tin` t INNER JOIN users us on t.idUser = us.idUser WHERE t.Duyet = 1 AND NoiBat = 1
        ORDER BY Ngay desc LIMIT 4";
        return $this->query($sql);
    }

    function getUserName($user) {
        $sql = "SELECT * FROM `users` WHERE username = '$user'";
        return $this->queryOne($sql);
    }
  } //class
