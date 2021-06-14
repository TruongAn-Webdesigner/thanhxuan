<div class="row-handmake">
        <article>
            <div class="boxcenter">
                <div class="bg-news">
                    <!-- blog -->
                    <div class="bg-news-left">
                        <div class="box-news-img">
                            <img src="../<?=$blogById['urlHinh']?>" alt="">                            
                        </div>
                        <div class="box-news-infor">                        
                            <span class="bottom-blog"><i class="fa fa-user" aria-hidden="true"></i> <?=$blogById['hoten']?></span>
                            <span class="bottom-blog"><i class="fa fa-calendar" aria-hidden="true"> </i> <?=$blogById['Ngay']?></span>                                                                                
                        </div>
                        <div class="box-news-title">
                            <?=$blogById['TieuDe']?>
                        </div>
                        <div class="box-news-tomtat">
                            <div class="container">
                                <p><?=$blogById['TomTat']?></p>
                            </div>
                        </div>
                        <div class="bg-noi-dung">
                            <?=$blogById['Content']?>
                        </div>

                        <div class="bg-related-post">
                            <div class="related-title">Bài đọc gần đây</div>
                            <div class="related-post">
                                <div class="post">
                                    <div class="post-img">
                                        <img src="../img/women.jpg" alt="" srcset="">
                                    </div>
                                    <div class="post-title"><a href="http://">ewfew wefij wefijw eiwad JWEF</a></div>
                                    <div class="post-button"><a href="http://">Đọc thêm</a></div>
                                </div>
                                <div class="post">
                                    <div class="post-img">
                                        <img src="../img/women.jpg" alt="" srcset="">
                                    </div>
                                    <div class="post-title"><a href="http://">ewfew wefij wefijw eiwad JWEF</a></div>
                                    <div class="post-button"><a href="http://">Đọc thêm</a></div>
                                </div>
                                <div class="post">
                                    <div class="post-img">
                                        <img src="../img/women.jpg" alt="" srcset="">
                                    </div>
                                    <div class="post-title"><a href="http://">ewfew wefij wefijw eiwad JWEF</a></div>
                                    <div class="post-button"><a href="http://">Đọc thêm</a></div>
                                </div>
                            </div>
                        </div>

                        <!-- phần bình luần -->
                        <div class="bg-comment">
                            <div class="box-comment-title">Bình luận</div>
                            <!-- phần đăng bình luận -->
                            <form action="" id="danglala">
                                <div class="post-comment">
                                    <div class="post-comment-img"><img src="../img/women.jpg" alt="" srcset=""></div>

                                    <div class="form-group">
                                        <div class="text-binh-luan"></div>
                                        <div class="form-group">
                                            <input type="hidden" id="layiduser" value="<?=$layinfor[0]?>">
                                            <input type="hidden" id="layidtin" value="<?=$blogById['idTin']?>">
                                        </div>
                                        <textarea placeholder="Bình luận của bạn" name="noidung" id="laynoidung" cols="50" rows="5" ></textarea>
                                        <?php 
                                            if (isset($_SESSION['user']) == true) { ?>
                                                <div class="box-news-button">
                                                <button type="submit" >Đăng</button>
                                            </div>
                                            <?php } else { ?>
                                                <div class="box-news-button">
                                                <button type="submit" >Đăng nhập</button>
                                                </div>
                                            <?php } ?>
                                    </div>
                                </div>
                            </form>

                            <!-- /phần đăng bình luận -->

                            <!-- show bình luận -->
                            <?php foreach ($comment as $itemCmt) { ?>
                                <div id="box_comment">
                                    <div class="show-comment">
                                        <div class="show-comment-img"><img src="../img/women.jpg" alt=""></div>

                                        <div class="show-comment-infor">
                                            <div class="show-comment-name-time">
                                                <div class="name">user</div>
                                                <div class="time"><?= $itemCmt['ngaygio']?></div>
                                            </div>
                                            <div class="show-comment-chat"><?= $itemCmt['noidung'] ?></div>
                                        </div>
                                    </div>
                                </div>                            
                            <?php } ?>
                            <!-- /show bình luận -->

                        </div>
                        <!-- phần bình luận -->

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
                                CATEGORIES
                            </div>
                            <div class="cata-list">
                            <div class="cata-name"><a href="http://">Sức khỏe</a> </div>
                            <div class="cata-name"><a href="http://">Bữa ăn hằng ngày</a> </div>
                            <div class="cata-name"><a href="http://">Tâm lý</a> </div>
                            </div>
                        </div>
                        <div class="bg-aside-popu">
                            <div class="popu-title">
                                BLOG NỔI BẬT
                            </div>
                            <div class="popu-list">
                                <div class="box-post">
                                    <div class="box-post-title"><a href="http://">Something la la la la lal wfeij ẹ</a></div>
                                    <div class="box-post-infor">
                                        <i class="fa fa-eye" aria-hidden="true"> Lượt xem</i>
                                        <i class="fa fa-user" aria-hidden="true"> tên</i>
                                    </div>
                                </div>
                                <div class="box-post">
                                    <div class="box-post-title"><a href="http://">Something la la la la lal wfeij ẹ</a></div>
                                    <div class="box-post-infor">
                                        <i class="fa fa-eye" aria-hidden="true"> Lượt xem</i>
                                        <i class="fa fa-user" aria-hidden="true"> tên</i>
                                    </div>
                                </div>
                                <div class="box-post">
                                    <div class="box-post-title"><a href="http://">Something la la la la lal wfeij ẹ</a></div>
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
            <!-- /blog -->
        </article>
    </div>

<script src="js/blogdetail.js"></script>
