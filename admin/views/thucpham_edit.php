<form method="POST" class="col-10 mx-auto border border-warning p-2 shadow rounded mt-4" action="<?= ADMIN_URL ?>/?ctrl=thucpham&act=update">
    <div class="row justify-content-center align-items-center text-warning">
        <h1>Sửa thực phẩm</h1>
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" id="ten_nn" name="id" value="<?= $list['id'] ?>">
        <label for="ten_loai">Tên thực phẩm</label>
        <input type="text" class="form-control" id="ten_nn" name="ten" value="<?= $list['ten'] ?>">
    </div>
    <div class="form-group">
        <label for="ten_loai">Protein</label>
        <input type="number"  class="form-control" id="ten_nn" name="protein" value="<?= $list['protein'] ?>">
    </div>
    <div class="form-group">
        <label for="ten_loai">Fat</label>
        <input type="number" class="form-control" id="ten_nn" name="fat" value="<?= $list['fat'] ?>">
    </div>
    <div class="form-group">
        <label for="ten_loai">Carb</label>
        <input type="number" class="form-control" id="ten_nn" name="carb" value="<?= $list['carb'] ?>">
    </div>
    <div class="form-group">
        <label for="ten_loai">Calo</label>
        <input type="number" class="form-control" id="ten_nn" name="calo" value="<?= $list['calo'] ?>">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Mô tả</label>
        <textarea id="content_" class="form-control" name="mota" rows="3" placeholder="Mô tả"><?=$list['mota']?></textarea>
    </div>
    <div class="form-group">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="anhien" <?php if ($list['anhien'] == 1) echo "checked"; ?> id="anhien1" value="1">
            <label class="form-check-label" for="anhien1"> Hiện </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="anhien" <?php if ($list['anhien'] == 0) echo "checked"; ?> id="anhien0" value="0">
            <label class="form-check-label" for="anhien0">Ẩn</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" onclick="return alert('Cập nhật thành công');">Lưu</button>
</form>
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script src="views/mainJS/edit_blog.js"></script>
<script>
    CKEDITOR.replace('content_', {
      height: 400,
      baseFloatZIndex: 10005
    });
  </script>