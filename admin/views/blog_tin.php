<?php if ($list == NULL) echo "Chưa có dữ liệu";
else ?>
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <?=$page_title?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="control_mid" scope="col">STT</th>
                            <th class="control_mid" scope="col-3">Tiêu đề</th>
                            <th class="control_mid" scope="col">Trạng thái</th>
                            <th class="control_mid" scope="col">Edit</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th class="control_mid">Name</th>
                            <th class="control_mid">Position</th>
                            <th class="control_mid">Office</th>
                            <th class="control_mid">Age</th>
                            <th class="control_mid">Start date</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                       <?php $i=1; foreach($list as $row){?>
                        <tr>
                            <th class="control_mid" scope="row"><?=$i++?></th>
                            <td class="control_mid"><?=$row['TieuDe']?></td>
                            <td class="control_mid"><?= ($row['AnHien'] == 0) ? "Đang ẩn" : "Đang hiện"; ?><br>
                            <a href="<?= ADMIN_URL ?>/?ctrl=blog&act=duyet&id=<?= $row['idTin'] ?> "> <?= ($row['Duyet'] == 0) ? "Chưa duyệt" : "Đã duyệt"; ?></a>
                            </td>
                            <td class="control_mid">
                                <a href="<?= ADMIN_URL ?>/?ctrl=blog&act=detail&id=<?= $row['idTin'] ?> "><button type="button" class="btn btn-primary">Chi tiết</button></a>
                                <a href="<?= ADMIN_URL ?>/?ctrl=blog&act=delete&id=<?= $row['idTin'] ?>"><button type="button" name="delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa</button></a>
                            </td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>