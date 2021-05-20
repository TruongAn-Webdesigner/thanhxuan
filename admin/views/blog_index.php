<?php if ($list == NULL) echo "Chưa có dữ liệu";
else ?>
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tieu De</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="control_mid" scope="col">Id</th>
                            <th class="control_mid" scope="col-3">Tên nhà sản xuất</th>
                            <th class="control_mid" scope="col">Thứ tự</th>
                            <th class="control_mid" scope="col">Hiện</th>
                            <th class="control_mid" scope="col">Điều khiển</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="control_mid">Name</th>
                            <th class="control_mid">Position</th>
                            <th class="control_mid">Office</th>
                            <th class="control_mid">Age</th>
                            <th class="control_mid">Start date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <!-- foreach ($list as $row) -->
                        <tr>
                            <th class="control_mid" scope="row"></th>
                            <td class="control_mid"></td>
                            <td class="control_mid"></td>
                            <td class="control_mid">
                                <div class="form-check">
                                    <input class="form-check-input" style="background-color: red;" type="checkbox" value="" disabled id="flexCheckIndeterminate">
                                    <!-- <label class="form-check-label" for="flexCheckIndeterminate">

                                    </label> -->
                                </div>
                            </td>
                            <td class="control_mid">
                                <a href="<?= ADMIN_URL ?>/?ctrl=nhasanxuat&act=edit&id=<?= $row['idnsx'] ?> "><button type="button" class="btn btn-primary">Chỉnh sửa</button></a>
                                <a href="<?= ADMIN_URL ?>/?ctrl=nhasanxuat&act=delete&id=<?= $row['idnsx'] ?>&tenNSX=<?= $row['tennsx'] ?>"><button type="button" name="delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa</button></a>
                            </td>
                        </tr>
                        <!--  -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>