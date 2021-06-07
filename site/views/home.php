<header>
    <div class="bg-header">
        <div class="bg-dot">
            <div class="box-dot-line">
                <div class="row-handmake">
                    <div class="navigation-manual">
                        <div class="dot"><label for="radio1" class="manual-btn"></label></div>
                        <div class="dot"><label for="radio2" class="manual-btn"></label></div>
                        <div class="dot"><label for="radio3" class="manual-btn"></label></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="nagigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
        </div>

        <!--       <div class="navigation-manual">

            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
      </div>
 -->
        <div class="bg-position-for-header"></div>
        <div class="bg-position-for-bg-right"></div>
        <div class="bg-position-line-outside"></div>

        <div class="boxcenter">
            <div class="bg-left">
                <div class="bg-number">
                    <div class="number" id="slide_number">
                        01
                    </div>
                </div>
                <div class="bg-img-left">
                    <div class="slider">
                        <div class="slides">
                            <input type="radio" name="radio-btn" onclick="innerNumberSlide(01);" id="radio1">
                            <input type="radio" name="radio-btn" onclick="innerNumberSlide(02);" id="radio2">
                            <input type="radio" name="radio-btn" onclick="innerNumberSlide(03);" id="radio3">

                            <div class="slide first">
                                <img src="../img/women.jpg" alt="">
                            </div>

                            <div class="slide">
                                <img src="../img/women.jpg" alt="">
                            </div>

                            <div class="slide">
                                <img src="../img/women.jpg" alt="">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- <div class="button-next"> <i class="fa fa-chevron-right" aria-hidden="true"></i> </div> -->
            </div>

            <div class="bg-right">
                <div class="bg-text-right">
                    <div class="text-right">
                        <div class="row">
                            <div class="text">
                                Nói lời <span class="span1">tạm biệt</span> với <br> <span class="span2">cân nặng</span> của bạn
                            </div>
                        </div>
                    </div>
                    <div class="button-header-right">
                        <div class="button-more">
                            <a href="http://">Khám phá</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>

<article>
    <!-- about us -->
    <div class="bg-about-us">
        <div class="boxcenter">
            <div class="bg-img-about">
                <div class="row-handmake">
                    <div class="box-img">
                        <img src="../img/women.jpg" alt="" srcset="">
                    </div>
                </div>
            </div>
            <div class="bg-text-about">
                <div class="box-text">
                    <div class="title-about">ABOUT US</div>
                    <div class="text-about">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, w
                            hen an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <div class="box-button-about">
                            <div class="icon-about">
                                <i id="icon1" class="instagram fa fa-instagram" aria-hidden="true"></i>
                                <i id="icon2" class="twitter fa fa-twitter" aria-hidden="true"></i> <br>
                                <i id="icon3" class="facebook fa fa-facebook" aria-hidden="true"></i>
                                <i id="icon4" class="pinterest fa fa-pinterest-p" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /about us -->

    <!-- help -->
    <div class="bg-help">
        <div class="boxcenter">
            <div class="box-help-left">
                <div class="box-help-text">
                    Bạn <span class="span1">có thể</span> <br> trở nên <span class="span2">khỏe đẹp hơn</span> những gì mà bạn nghĩ
                </div>
                <?php require_once "models/model_home.php";
                  $this->model = new model_home();
                  $tin1 = $this->model->chitiet(2);
                  $tin2 = $this->model->chitiet(3);
                  $tin3 = $this->model->chitiet(4);
                  $tin4 = $this->model->chitiet(1);
                ?>
                <div class="box-help-img-left">
                    <div class="box-help-img-1">
                        <a></a><img src="../<?=$tin2['urlHinh']?>" alt="" srcset="">
                        <div class="title-help-1"><?=$tin2['TieuDe']?></div>
                    </div>

                    <div class="box-help-img-2">
                        <div class="box-help-img-2a">
                            <img src="../<?=$tin1['urlHinh']?>" alt="" srcset="">
                            <div class="title-help-2a"><?=$tin1['TieuDe']?></div>
                        </div>
                        <div class="box-help-img-2b">
                            <img src="../<?=$tin3['urlHinh']?>" alt="" srcset="">
                            <div class="title-help-2b"><?=$tin3['TieuDe']?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-help-right">
                <div class="box-help-img-right">
                    <div class="box-help-img-3">
                        <img src="../<?=$tin4['urlHinh']?>" alt="" srcset="">
                        <div class="title-help"><?=$tin4['TieuDe']?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /help -->

    <!-- calc calo -->
    <div class="mainCount">
        <div class="boxcenter">
            <div class="box-select">
                <select name="" id="selectCount">
                    <option value="bg-calo">Calo</option>
                    <option value="bg-bmi">BMI</option>
                    <option value="bg-ti_le_mo">Tỉ lệ mỡ</option>
                </select>
            </div>
        </div>
        <div class="form_main bg-calo z-index-2 show opacity-1" id="bg-calo">
            <div class="boxcenter">
                <div class="bg-calo-title">
                    <div class="calo-title">
                        Tính Calo
                    </div>
                    <div class="calo-small">
                        Tính toán khả năng tiêu thụ calo của cơ thê bạn trong một ngày
                    </div>
                </div>
            </div>
            <div class="bg-display-calo" id="show">
                <div class="boxcenter">
                    <div class="bg-calo-left">
                        <div class="bg-calo-form">
                            <div class="calo-form-title">
                                Mục tiêu
                                <div class="calo-form-title-small">
                                    giảm calo
                                </div>
                            </div>
                            <form id="tinhcalo">
                                <div class="form-group row">
                                    <label for="" class="col-4">Tuổi:</label>
                                    <input type="text" class="form-control col-8" id="cl_tuoi" placeholder="Tuổi">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-4">Chiều cao:</label>
                                    <input type="text" class="form-control col-8" id="cl_chieucao" placeholder="Chiều cao">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4">Cân nặng:</label>
                                    <input type="text" class="form-control col-8" id="cl_cannang" placeholder="Cân nặng">
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-4">Giới tính:</label>
                                    <div class="col-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cl_gioitinh" id="inlineRadio2" checked value="1">
                                            <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cl_gioitinh" id="inlineRadio1" value="0">
                                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-4">Hoạt động:</label>
                                    <select class="form-control col-8" id="cl_Vandong">
                                        <option value="1.2">Ít vận động: ít hoặc không tập thể dục</option>
                                        <option value="1.375">Nhẹ: tập thể dục 1-3 lần/tuần</option>
                                        <option value="1.55">Vừa: tập thể dục 3-5 lần/tuần</option>
                                        <option value="1.725">Mạnh: tập thể dục hằng ngày hoặc vận động cường độ cao 6-7 lần/tuần</option>
                                        <option value="1.9">Đặc biệt: vận động cường độ cao hằng ngày hoặc công việc nặng</option>
                                    </select>

                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4"></label>
                                    <button type="submit" class="calc col-8">Tính</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="bg-calo-right">
                        <div class="bg-calo-show">
                            <div class="row-handmake" id="box_calo">
                                <div class="cl_about">
                                    <div class="calo-about-title">CALO</div>
                                    <div class="calo-about">
                                        Lượng calo nạp vào cơ thể mỗi ngày sẽ quyết định cân nặng và sức khỏe của bạn.
                                        Quá nhiều calo sẽ dẫn đến thừa cân và ngược lại.
                                        Tuy nhiên, không có quy định chung cho mức calo của mọi người vì mỗi cá nhân sẽ có lượng calo tiêu thụ khác nhau.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /calc calo -->

        <!-- calc bmi -->
        <div class="form_main bg-bmi opacity-0" id="bg-bmi">
            <div class="boxcenter">
                <div class="bg-bmi-title">
                    <div class="bmi-title">
                        Tính BMI
                    </div>
                    <div class="bmi-small">
                        Tính toán khả năng tiêu thụ calo của cơ thê bạn trong một ngày
                    </div>
                </div>
            </div>
            <div class="bg-display-bmi">
                <div class="boxcenter">
                    <div class="bg-bmi-left">
                        <div class="bg-bmi-show">
                            <div class="row-handmake" id="box_bmi">
                                <div class="bmi_about">
                                    <div class="bmi-about-title">BMI</div>
                                    <div class="bmi-about">
                                        là chỉ số tiêu chuẩn để xác định tình trạng mập ốm của cơ thể dựa trên chiều cao, cân nặng và độ tuổi.
                                        Nó được sử dụng rộng rãi như một chỉ số chung để xác định nếu một người có cân nặng hợp lý so với chiều cao của họ.
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="bg-bmi-right">
                        <div class="bg-bmi-form">
                            <div class="bmi-form-title">
                                Mục tiêu
                                <div class="bmi-form-title-small">
                                    cân đối
                                </div>
                            </div>
                            <form id="form_bmi">
                                <div class="form-group row">
                                    <label for="" class="col-4">Chiều cao:</label>
                                    <input type="number" class="form-control col-8" id="bmi_chieucao" placeholder="Chiều cao (cm)">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4">Cân nặng:</label>
                                    <input type="number" class="form-control col-8" id="bmi_cannang" placeholder="Cân nặng">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4"></label>
                                    <button type="submit" class="calc col-8">Tính</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /calc bmi -->
        <!-- ti le mo -->
        <div class="form_main bg-ti_le_mo opacity-0" id="bg-ti_le_mo">
            <div class="boxcenter">
                <div class="bg-bmi-title">
                    <div class="bmi-title">
                        Tính tỉ lệ mỡ
                    </div>
                    <div class="bmi-small">
                        Tính toán khả năng tiêu thụ calo của cơ thê bạn trong một ngày
                    </div>
                </div>
            </div>
            <div class="bg-display-bmi">
                <div class="boxcenter">
                    <div class="bg-bmi-left">
                        <div class="bg-bmi-show" id="result_bodyFat">
                              <div class="row-handmake" id="about_bodyFat">
                                  <div class="bmi-about-title">Tỉ lệ mỡ</div>
                                  <div class="bmi-about">
                                      là chỉ số tiêu chuẩn để xác định tình trạng mập ốm của cơ thể dựa trên chiều cao, cân nặng và độ tuổi.
                                      Nó được sử dụng rộng rãi như một chỉ số chung để xác định nếu một người có cân nặng hợp lý so với chiều cao của họ.
                                  </div>
                              </div>

                        </div>
                    </div>
                    <div class="bg-bmi-right">
                        <div class="bg-bmi-form">
                            <div class="bmi-form-title">
                                Mục tiêu
                                <div class="bmi-form-title-small">
                                    giảm mỡ
                                </div>
                            </div>
                            <form id="form_mo" name="form_mo">
                                <div class="form-group row">
                                    <label for="" class="col-4">Giới tính:</label>
                                    <div class="col-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio" name="mo_gioitinh" checked value="1">
                                            <label class="form-check-label">Nữ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input " type="radio" name="mo_gioitinh" value="0">
                                            <label class="form-check-label">Nam</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4">Chiều cao</label>
                                    <input type="number" class="form-control col-8" id="mo_chieucao" placeholder="Cm">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4">Chu vi cổ</label>
                                    <input type="number" class="form-control col-8" id="mo_chuvico" placeholder="Cm">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4">Vòng eo</label>
                                    <input type="number" class="form-control col-8" id="mo_vongeo" placeholder="Cm">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4">Vòng hông</label>
                                    <input type="number" class="form-control col-8" id="mo_vonghong" placeholder="Cm">
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-4"></label>
                                    <button type="submit" class="calc col-8">Tính</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ti le mo -->
        </div>


</article>

<script src="js/home.js"></script>
