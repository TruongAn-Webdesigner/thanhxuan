<header>
    <div class="bg-header">
        <div class="bg-three-box-header">
            <div class="bg-box-1">
                <div class="bg-box-1-top"></div>
                <div class="bg-box-1-img" style="height: 48rem;">
                    <img src="../img/kichen.jpg" alt="" srcset="">
                </div>
            </div>
            <div class="bg-box-2">
                <div class="bg-box-2-top"></div>
                <div class="bg-box-2-bottom"></div>
            </div>
            <div class="bg-box-3">
                <div class="bg-box-3-top"></div>
            </div>
        </div>
        <div class="bg-position-box-header">
            <div class="boxcenter">
                <div class="bg-three-box-text">
                    <div class="box-text-1">HEAL</div>
                    <div class="box-text-2">
                        <div class="box-text-2-left">
                            THY
                        </div>
                        <div class="box-text-2-right">
                            BL
                        </div>
                    </div>
                    <div class="box-text-3">
                        <div class="box-text-3-left">
                            <div class="box-img-3">
                                <img src="../img/apple.png" alt="" srcset="">
                            </div>
                        </div>
                        <div class="box-text-3-right">
                            G
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- /header -->

<!-- article -->
<article>
    <div class="boxcenter">
        <div class="bg-news-parent">
            <div class="bg-news-title-big">Blog phổ biến</div>
            <div class="bg-news">
                <!-- blog -->
                <!-- blog lớn -->
                <div class="bao-bg-news-left">
                    <div class="bg-news-left">

                        <div class="box-news">
                            <div class="bg-news-img">
                                <img src="../<?= $list['urlHinh'] ?>" alt="">
                            </div>
                            <div class="bg-news-title">
                                <div class="box-news-title">
                                    <a href="http://"><?= $list['TieuDe'] ?></a>
                                </div>
                                <div class="box-news-infor">
                                    <i class="fa fa-user" aria-hidden="true"> <?= $list['NguoiDang'] ?></i>
                                    <i class="fa fa-calendar" aria-hidden="true"> (<?= $list['Ngay'] ?>)</i>
                                </div>
                                <div class="box-news-button">
                                    <a href="<?= SITE_URL ?>/?act=detail&id=<?= $list['idTin'] ?> ">Đọc tiếp</a>
                                </div>
                            </div>
                        </div>
                        <!-- /blog lớn -->

                        <!-- blog nhỏ -->
                        <div class="bg-news-small">
                            <?php foreach ($list3 as $ds) { ?>
                                <div class="box-news-small">
                                    <div class="box-news-small-img" style="height: 8rem;">
                                        <img src="../<?= $ds['urlHinh'] ?>" alt="" srcset="">
                                    </div>
                                    <div class="box-news-small-infor">
                                        <div class="box-news-small-title">
                                            <a href="<?= SITE_URL ?>/?act=detail&id=<?= $list['idTin'] ?>"><?= $ds['TieuDe'] ?> </a>
                                        </div>
                                        <div class="box-news-small-day">
                                            <i class="fa fa-calendar" aria-hidden="true"> </i><?= $ds['Ngay'] ?>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>


                        </div>
                        <!-- /blog nhỏ -->
                    </div>
                    <!-- blog tâm lý bỏ -->

                    <div class="bg-news-theo-muc">
                        <div class="news-theo-muc-title-big">Bửa Ăn</div>
                        <!-- box  -->
                        <div class="bg-news-theo-muc-box">

                            <div class="box-news-theo-muc">
                                <?php
                                foreach ( $tinBA as $BA) { ?>
                                    <div class="box-news-theo-muc-bao">
                                        <div class="box-news-theo-muc-img">
                                            <img src="../<?=$BA['urlHinh']?>" alt="" srcset="">
                                        </div>
                                        <div class="box-news-theo-muc-title">
                                            <div class="title-ngay-dang-user">
                                                <i class="fa fa-calendar" aria-hidden="true"> </i> <?=$BA['Ngay']?>
                                                <i class="fa fa-user" aria-hidden="true"> <?=$BA['NguoiDang']?></i>
                                            </div>
                                            <a href="<?= SITE_URL ?>/?act=detail&id=<?= $list['idTin'] ?> "><?=$BA['TieuDe']?> </a>
                                        </div>
                                    </div>
                                <?php } ?>




                            </div>
                            <!-- /box -->
                        </div>

                    </div>
                    <!-- /blog tấm lý-->

                    <!-- blog sức khỏe -->
                    <div class="bg-news-theo-muc">
                        <div class="news-theo-muc-title-big">Giá trị tinh thần</div>
                        <!-- box-->
                        <div class="bg-news-theo-muc-box">

                            <div class="box-news-theo-muc">
                                <?php
                                foreach ( $tinTL as $TL) { ?>
                                    <div class="box-news-theo-muc-bao">
                                        <div class="box-news-theo-muc-img">
                                            <img src="../<?=$TL['urlHinh']?>" alt="" srcset="">
                                        </div>
                                        <div class="box-news-theo-muc-title">
                                            <div class="title-ngay-dang-user">
                                                <i class="fa fa-calendar" aria-hidden="true"> </i> <?=$TL['Ngay']?>
                                                <i class="fa fa-user" aria-hidden="true"> <?=$TL['NguoiDang']?></i>
                                            </div>
                                            <a href="<?= SITE_URL ?>/?act=detail&id=<?= $list['idTin'] ?> "><?=$TL['TieuDe']?> </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- /box-->
                        </div>

                    </div>
                    <!-- /blog sức khỏe -->


                    <!-- blog bữa ăn hằng ngày -->
                    <div class="bg-news-theo-muc">
                        <div class="news-theo-muc-title-big">Bữa ăn hằng ngày</div>
                        <!-- box -->
                        <div class="bg-news-theo-muc-box">

                            <div class="box-news-theo-muc">
                                <div class="box-news-theo-muc-bao">
                                    <div class="box-news-theo-muc-img">
                                        <img src="../img/women.jpg" alt="" srcset="">
                                    </div>
                                    <div class="box-news-theo-muc-title">
                                        <div class="title-ngay-dang-user">
                                            <i class="fa fa-calendar" aria-hidden="true"> </i> 12/12/2012
                                            <i class="fa fa-user" aria-hidden="true"> (Tên người đăng)</i>
                                        </div>
                                        <a href="http://">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. </a>
                                    </div>
                                </div>
                                <div class="box-news-theo-muc-bao">
                                    <div class="box-news-theo-muc-img">
                                        <img src="../img/women.jpg" alt="" srcset="">
                                    </div>
                                    <div class="box-news-theo-muc-title">
                                        <div class="title-ngay-dang-user">
                                            <i class="fa fa-calendar" aria-hidden="true"> </i> 12/12/2012
                                            <i class="fa fa-user" aria-hidden="true"> (Tên người đăng)</i>
                                        </div>
                                        <a href="http://">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. </a>
                                    </div>
                                </div>

                                <div class="box-news-theo-muc-bao">
                                    <div class="box-news-theo-muc-img">
                                        <img src="../img/women.jpg" alt="" srcset="">
                                    </div>
                                    <div class="box-news-theo-muc-title">
                                        <div class="title-ngay-dang-user">
                                            <i class="fa fa-calendar" aria-hidden="true"> </i> 12/12/2012
                                            <i class="fa fa-user" aria-hidden="true"> (Tên người đăng)</i>
                                        </div>
                                        <a href="http://">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. </a>
                                    </div>
                                </div>

                                <div class="box-news-theo-muc-bao">
                                    <div class="box-news-theo-muc-img">
                                        <img src="../img/women.jpg" alt="" srcset="">
                                    </div>
                                    <div class="box-news-theo-muc-title">
                                        <div class="title-ngay-dang-user">
                                            <i class="fa fa-calendar" aria-hidden="true"> </i> 12/12/2012
                                            <i class="fa fa-user" aria-hidden="true"> (Tên người đăng)</i>
                                        </div>
                                        <a href="http://">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. </a>
                                    </div>
                                </div>

                            </div>
                            <!-- /box-->
                        </div>

                    </div>
                    <!-- /blog bữa ăn hằng ngày -->

                </div>
                <!-- blog -->

                <!-- aside -->
                <div class="bg-news-right-aside">
                    <div class="bg-aside-search">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="bg-aside-cata">
                        <div class="cata-title">
                            Đăng bài
                        </div>
                        <div class="">
                            <button type="button" data-toggle="modal" data-target="#dangbai">Đăng bài</button>
                        </div>
                    </div>
                    <div class="bg-aside-cata">
                        <div class="cata-title">
                            CATEGORIES
                        </div>
                        <div class="cata-list">
                            <?php require_once "models/model_home.php";
                            $this->model = new model_home();
                            $list = $this->model->listLoaitin();
                            foreach ($list as $ds) { ?>
                                <div class="cata-name"><a href=""><?= $ds['Ten'] ?></a> </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bg-aside-popu">
                        <div class="popu-title">
                            BLOG NỔI BẬT
                        </div>
                        <div class="popu-list">
                            <div class="box-post">
                                <div class="box-post-title"><a href="http://">Something la la la la lal wfeij ẹ</a>
                                </div>
                                <div class="box-post-infor">
                                    <i class="fa fa-eye" aria-hidden="true"> Lượt xem</i>
                                    <i class="fa fa-user" aria-hidden="true"> tên</i>
                                </div>
                            </div>
                            <div class="box-post">
                                <div class="box-post-title"><a href="http://">Something la la la la lal wfeij ẹ</a>
                                </div>
                                <div class="box-post-infor">
                                    <i class="fa fa-eye" aria-hidden="true"> Lượt xem</i>
                                    <i class="fa fa-user" aria-hidden="true"> tên</i>
                                </div>
                            </div>
                            <div class="box-post">
                                <div class="box-post-title"><a href="http://">Something la la la la lal wfeij ẹ</a>
                                </div>
                                <div class="box-post-infor">
                                    <i class="fa fa-eye" aria-hidden="true"> Lượt xem</i>
                                    <i class="fa fa-user" aria-hidden="true"> tên</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-aside-subs">
                        <div class="subs-title">
                            ĐĂNG KÝ ĐỂ NHẬN TIN MỚI
                        </div>
                        <div class="box-subs">
                            <div class="box-subs-titile">
                                Nhập email để có thể nhận tin mới nhất từ blog
                            </div>
                            <div class="box-subs-input">
                                <form action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                </form>
                            </div>
                            <div class="box-subs-button">
                                <div class="box-news-button">
                                    <a href="http://">Đăng ký</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /aside -->

            </div>

        </div>

    </div>
    <!-- /blog -->
</article>

<!-- Modal -->
<div class="modal fade" id="dangbai" tabindex="-1" role="dialog" aria-labelledby="dangbaiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dangbaiLabel">Trở thành tác giả</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= SITE_URL ?>/?act=addnew" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Ảnh đại diện</label>
                        <input type="file" name="urlHinh" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="TieuDe" class="form-control" id="" placeholder="Bửa ăn sáng dinh dưỡng của tôi,...">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputState">Loại tin</label>
                                <select id="inputState" name="idLT" class="form-control" require>
                                    <?php require_once "models/model_home.php";
                                    $this->model = new model_home();
                                    $loaitin = $this->model->listLoaiTin();
                                    foreach ($loaitin as $lt) { ?>
                                        <option value="<?= $lt['idLT'] ?>"> <?= $lt['Ten'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected value="vi">VI</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <textarea id="editor" name="NoiDung"></textarea>
            </div>
            <?php if (!isset($_SESSION['user'])) { ?>
                <div class="form-group">
                    <label class="text-danger">Bạn cần đăng nhập để có thể đăng bài viết !</label>
                </div>
            <?php } ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if (!isset($_SESSION['user'])) { ?>
                    <button type="button" class="btn btn-disabled">Save changes</button>
                <?php } else { ?>
                    <button type="submit" class="btn btn-success">Save changes</button>
                <?php } ?>
            </div>
            </form>
        </div>

    </div>
</div>
</div>

<script src="js/blog.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
