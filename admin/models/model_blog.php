<?php
    session_start();
    require_once '../system/model_system.php';
    class model_blog extends model_system {
        function storePD($ten, $giagoc, $giakm, $imgUrl, $thoidiemnhap, $motadienthoai, $solanxem, $solanmua, $hot, $idnsx, $AnHien, $soluongtonkho){ //hàm lưu 1 record vào table
            $sql = "INSERT INTO `dienthoai` (`tendt`, `gia`, `giakm`, `urlhinh`, `Thoidiemnhap`, `mota`, `solanxem`, `solanmua`, `hot`, `idnsx`, `anhien`, `soluongtonkho`)
             VALUES ('$ten', '$giagoc', '$giakm', '$imgUrl', '$thoidiemnhap', '$motadienthoai', '$solanxem', '$solanmua', '$hot', $idnsx, '$AnHien', '$soluongtonkho')";
            $this->execute($sql);
        }
        function updatePD($iddt, $ten, $giagoc, $giakm, $imgUrl, $thoidiemnhap, $motadienthoai, $solanxem, $solanmua, $hot, $idnsx, $AnHien, $soluongtonkho) { //hàm cập nhật 1 record vào table
            $sql = "UPDATE `dienthoai` SET `tendt` = '$ten', `gia` = '$giagoc', `giakm` = '$giakm', `urlhinh` = '$imgUrl', `Thoidiemnhap` = '$thoidiemnhap', `mota` = '$motadienthoai', `solanxem` = '$solanxem', `solanmua` = '$solanmua', `hot` = '$hot', `idnsx` = '$idnsx', `anhien` = '$AnHien', `soluongtonkho` = '$soluongtonkho' WHERE `dienthoai`.`iddt` = $iddt;";
            $this->execute($sql);
        }
        function deletePD($id) {  //hàm xóa 1 record khỏi table
            $sql = "DELETE FROM `dienthoai` WHERE `dienthoai`.`iddt` = $id";
            $this->execute($sql);
        }
        function listrecordsPD() { //hàm lấy các record trong table
            $sql = "SELECT * FROM dienthoai";
            $kq= $this->query($sql);
            return $kq;
        }
        function listrecordsPDPagination($page_num, $page_size) { //hàm lấy các record trong table
            $start_row= ($page_num - 1) * $page_size;
            $sql = "SELECT dt.iddt, dt.tendt, dt.gia, dt.giakm, dt.urlhinh, dt.Thoidiemnhap, dt.mota, dt.solanxem, dt.solanmua, dt.hot, dt.idnsx, dt.anhien, dt.soluongtonkho, dt.idnsx, nsx.tennsx FROM dienthoai dt inner join nhasanxuat nsx on nsx.idnsx = dt.idnsx ORDER BY Thoidiemnhap DESC LIMIT $start_row, $page_size";
            $kq= $this->query($sql);
            return $kq;
        }
        function countPD() {
            $sql="SELECT count(*) as sodong  FROM dienthoai";
            return $this->queryOne($sql);
        }
        function detailrecordPD($id) { //hàm lấy chi tiết 1 record trong table
            $sql = "SELECT * FROM dienthoai dt inner join thuoctinhdt tt on dt.iddt = tt.iddt where dt.iddt = $id";
            return $this->queryOne($sql);
        }
        function newidpd() { //hàm lấy chi tiết 1 record trong table
            $sql = "SELECT iddt FROM dienthoai ORDER BY iddt DESC LIMIT 1";
            return $this->queryOne($sql);
        }
        function taolinks($baseurl, $page_num, $page_size, $total_rows) {
            if ($total_rows<=0) return "";
            $total_pages = ceil($total_rows/$page_size);
            // 5/6 = 0.83 => ceil làm tròn dương => = 1
            if ($total_pages<=1) return "";
            //Trang đầu Trang trước
            if ($page_num>=2) {
                $pr = $page_num - 1;
                $pr2 = $page_num - 2;
                $pr3 = $page_num - 3;
                $pr4 = $page_num - 4;
                $links="<li class='page-item'><a href='{$baseurl}' class='page-link' ><i class='fas fa-fast-backward'></i></a></li>";
                if ($page_num > 4) {
                    $links.="<li class='page-item'><a href='{$baseurl}&page_num={$pr4}' class='page-link' aria-label='Next'>$pr4</i></a></li>";
                }
                if ($page_num > 3 ) {
                    $links.="<li class='page-item'><a href='{$baseurl}&page_num={$pr3}' class='page-link' aria-label='Next'>$pr3</i></a></li>";
                }
                if ($page_num > 2) {
                    $links.="<li class='page-item'><a href='{$baseurl}&page_num={$pr2}' class='page-link' aria-label='Next'>$pr2</i></a></li>";
                }
                $links.="<li class='page-item'><a href='{$baseurl}&page_num={$pr}' class='page-link' aria-label='Previous'>$pr</i></a></li>";
            }
            $links.="<li class='page-item active'><span class='page-link'>{$page_num}</span></li>";
            //Trang kế , Trang cuối
            if ($page_num<$total_pages) {
                $pn = $page_num + 1;
                $pn2 = $page_num + 2;
                $pn3 = $page_num + 3;
                $pn4 = $page_num + 4;
                $links.="<li class='page-item'><a href='{$baseurl}&page_num={$pn}' class='page-link' aria-label='Next'>$pn</i></a></li>";
                if ($page_num + 1 < $total_pages ) {
                    $links.="<li class='page-item'><a href='{$baseurl}&page_num={$pn2}' class='page-link' aria-label='Next'>$pn2</i></a></li>";
                }
                if ($page_num + 2 < $total_pages ) {
                    $links.="<li class='page-item'><a href='{$baseurl}&page_num={$pn3}' class='page-link' aria-label='Next'>$pn3</i></a></li>";
                }
                if ($page_num + 3 < $total_pages ) {
                    $links.="<li class='page-item'><a href='{$baseurl}&page_num={$pn4}' class='page-link' aria-label='Next'>$pn4</i></a></li>";
                }
                $links.="<li class='page-item'><a href='{$baseurl}&page_num={$total_pages}' class= 'page-link'><i class='fas fa-fast-forward'></i>
                </a></li>";
            }
            return $links;
        }
    }//class \
?>
