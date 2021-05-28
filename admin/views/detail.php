<?php if ($list == NULL) echo "Chưa có dữ liệu";
else ?>
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <?= $page_title ?></h6>
        </div>
        <div class="row p-2">
            <div class="col-md-5">
                <img src="/<?= $list['urlHinh'] ?>" width="600px" height="400px">
            </div>
            <div class="col-md-7">
                <ul class="list-group">
                    <li class="list-group-item"><b><h4>Tiêu đề: <?=$list['TieuDe']?></h4></b>  </li>
                    <li class="list-group-item"><b><h4>Tóm tắt: <?=$list['TomTat']?></h4></b>  </li>
                    <li class="list-group-item"><b>Trạng thái: <?= ($list['Duyet'] == 0) ? "Chưa duyệt" : "Đã duyệt"; ?> <br>
                    Ngày đăng :<?=$list['Ngay']?> <br>
                    Nổi bật : <?= ($list['NoiBat'] == 0) ? "Có" : "Không"; ?> <br>
                    Ẩn hiện :
                    <?= ($list['AnHien'] == 0) ? "Đang ẩn" : "Đang hiện"; ?>
                    
                    </li>
                    <li class="list-group-item">
                        <a href="<?= ADMIN_URL ?>/?ctrl=blog&act=edit&id=<?= $list['idTin'] ?>"><button class="btn btn-primary px-5 py-2" >Sửa
                            </button></a>
                        <a href="<?= ADMIN_URL ?>/?ctrl=blog&act=index"><button class="btn btn-warning px-5 py-2" idSP="<?= $sp['idDT'] ?>">Về trang trước
                            </button></a>
                    </li>

            </div>
        </div>
        <div class="row p-2">
            <div class="col-12">
                <?= $list['Content']; ?>
            </div>
        </div>
    </div>
</div>