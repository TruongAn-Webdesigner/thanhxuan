<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $page_title ?></h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= ADMIN_URL ?>/?ctrl=blog&act=update">
                <input type="hidden" name="idTin" value="<?= $list['idTin'] ?>">
                <div class=" mx-auto">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Loại tin</label>
                        <select name="idLT" class="form-control" required>
                            <option value="">Chọn loại tin</option>
                            <?php require_once "models/model_blog.php";
                            $this->model = new model_blog();
                            $loaitin = $this->model->listLoaiTin();
                            foreach ($loaitin as $lt) { ?>
                                <?php if ($list['idLT'] == $lt['idLT']) { ?>
                                    <option value="<?= $lt['idLT'] ?>" selected="selected"> <?= $lt['Ten'] ?></option>
                                <?php } else { ?>
                                    <option value="<?= $lt['idNSX'] ?>"> <?= $lt['Ten'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" name="TieuDe" id="exampleFormControlInput1" placeholder="Nhập" value="<?= $list['TieuDe'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tóm tắt</label>
                        <textarea id="area1" class="form-control" name="TomTat" rows="3" placeholder="Mô tả"><?= $list['TomTat'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nội dung</label>
                        <textarea id="area1" class="form-control" name="Content" rows="10" placeholder="Mô tả"><?= $list['Content'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ngày nhập</label>
                        <input type="date" class="form-control" name="Ngay" id="exampleFormControlInput1" placeholder="Nhập" value="<?= $list['Ngay'] ?>" required>
                    </div>
                    <div class="row">
                        <div class=" mb-3 col-6 ">
                            <label for="">Ẩn hiện:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="AnHien" id="anhien1" value="1" <?= ($list['AnHien'] == 1) ? "checked" : ""; ?>>
                                <label class="form-check-label" for="anhien1"> Hiện </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="AnHien" id="anhien0" value="0" <?= ($list['AnHien'] == 0) ? "checked" : ""; ?>>
                                <label class="form-check-label" for="anhien0">Ẩn</label>
                            </div>
                        </div>
                        <div class=" mb-3  col-6">
                            <label for="">Nổi bật:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="NoiBat" id="anhien1" value="1" <?= ($list['NoiBat'] == 1) ? "checked" : ""; ?>>
                                <label class="form-check-label" for="anhien1"> Có </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="NoiBat" id="anhien0" value="0" <?= ($list['NoiBat'] == 0) ? "checked" : ""; ?>>
                                <label class="form-check-label" for="anhien0">Không</label>
                            </div>
                        </div>
                    </div>
                    <button name="nutsave" type="submit" class="btn btn-primary d-inline-block float-right">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>