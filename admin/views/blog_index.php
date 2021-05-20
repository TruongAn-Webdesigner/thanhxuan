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
                            <th class="control_mid" scope="col">Id</th>
                            <th class="control_mid" scope="col-3">Tên loại tin</th>
                            <th class="control_mid" scope="col">Ẩn hiện</th>
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
                       <?php foreach($list as $row){?>
                        <tr>
                            <th class="control_mid" scope="row"><?=$row['idLT']?></th>
                            <td class="control_mid"><?=$row['Ten']?></td>
                            <td class="control_mid"><?= ($row['AnHien'] == 0) ? "Đang ẩn" : "Đang hiện"; ?></td>
                            <td class="control_mid">
                                <a href="<?= ADMIN_URL ?>/?ctrl=nhasanxuat&act=edit&id=<?= $row['idnsx'] ?> "><button type="button" class="btn btn-primary">Chỉnh sửa</button></a>
                                <a href="<?= ADMIN_URL ?>/?ctrl=nhasanxuat&act=delete&id=<?= $row['idnsx'] ?>&tenNSX=<?= $row['tennsx'] ?>"><button type="button" name="delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa</button></a>
                            </td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>