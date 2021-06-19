<?php if ($list == NULL) echo "Chưa có dữ liệu";
else ?>

<div class="container-fluid">
    <!-- DataTales Example -->
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <?=$page_title?></h6>
        </div>
        
        <div class="card-body">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
  Thêm thực phẩm  <i class="fas fa-plus-square"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      <form method="POST" class="col-12 mx-auto border border-warning p-2 shadow rounded mt-4" action="<?= ADMIN_URL ?>/?ctrl=thucpham&act=addnew">
    <div class="row justify-content-center align-items-center text-warning">
        <h1>Thêm thực phẩm</h1>
    </div>
    <div class="form-group">
       
        <label for="ten_loai">Tên thực phẩm</label>
        <input type="text" class="form-control" id="ten_nn" name="ten" required >
    </div>
    <div class="form-group">
        <label for="ten_loai">Protein</label>
        <input type="number"  class="form-control" id="ten_nn" name="protein" required >
    </div>
    <div class="form-group">
        <label for="ten_loai">Fat</label>
        <input type="number" class="form-control" id="ten_nn" name="fat" required >
    </div>
    <div class="form-group">
        <label for="ten_loai">Carb</label>
        <input type="number" class="form-control" id="ten_nn" name="carb" required >
    </div>
    <div class="form-group">
        <label for="ten_loai">Calo</label>
        <input type="number" class="form-control" id="ten_nn" name="calo" required >
    </div>
    <div class="form-group">
        <label for="" class="form-label">Mô tả</label>
        <textarea id="content_" class="form-control" name="mota" rows="3" placeholder="Mô tả"></textarea>
    </div>
    <div class="form-group">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="anhien"  value="1" checked>
            <label class="form-check-label" for="anhien1"> Hiện </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="anhien" value="0">
            <label class="form-check-label" for="anhien0">Ẩn</label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
      </div>
</form>

      </div>
      
    </div>
  </div>
</div>
            <div class="table-responsive">
            
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                    <thead>
                        <tr>
                            <th class="control_mid" scope="col">Id</th>
                            <th class="control_mid" scope="col-3">Tên thực phẩm</th>
                            <th class="control_mid" scope="col">Giá trị dinh dưỡng</th>
                            <th class="control_mid" scope="col">Mô tả</th>
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
                            <td class="control_mid" scope="row" width="5%"><?=$row['id']?></td>
                            <td class="control_mid"  with="20%"><?=$row['ten']?> <br> <b><?= ($row['anhien'] == 0) ? "Đang ẩn" : "Đang hiện"; ?></b> </td>
                            <td class="control_mid" width="20%">
                                <b>Protein :</b><?=$row['protein']?>
                                <br><b>Fat :</b><?=$row['fat']?>
                                <br><b>Carb :</b><?=$row['carb']?>
                                <br><b>Calo :</b><?=$row['calo']?>
                            </td>
                            <td class="control_mid" scope="row" width="40%"><?=$row['mota']?></td>
                            <td class="control_mid" width="15%">
                                <a href="<?= ADMIN_URL ?>/?ctrl=thucpham&act=edit&id=<?= $row['id'] ?>"><button type="button" class="btn btn-primary">Chỉnh sửa</button></a>
                                <a href="<?= ADMIN_URL ?>/?ctrl=thucpham&act=delete&id=<?= $row['id'] ?>"><button type="button" name="delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</button></a>
                            </td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script src="views/mainJS/edit_blog.js"></script>
<script>
    CKEDITOR.replace('content_', {
      height: 400,
      baseFloatZIndex: 10005
    });
  </script>