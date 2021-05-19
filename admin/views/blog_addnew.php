<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?=$page_title?></h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?=ADMIN_URL?>/?ctrl=nhasanxuat&act=store">
                <div class=" mx-auto">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên nhà sản xuất</label>
                        <input type="text" class="form-control" name="TenNSX" id="exampleFormControlInput1" placeholder="Nhập">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Thứ tự</label>
                        <input type="text" class="form-control" name="ThuTu" id="exampleFormControlInput1" placeholder="Nhập">
                    </div>
                    <div class="custom-control custom-checkbox mb-3 d-inline-block">
                        <input class="custom-control-input" type="checkbox" value="1" name="AnHien"  id="customCheck">
                        <label class="custom-control-label" for="customCheck">Hiện</label>
                    </div>
                    <button name="nutsave" type="submit" class="btn btn-primary d-inline-block float-right">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
