<!-- <header>
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
    </header> -->
<!-- /header -->

<!-- article -->

<article>
  <div class="bg-thuc-don-parent">
    <div class="boxcenter">
      <div class="bg-thuc-don-left">
        <div class="bg-menu-thuc-don"></div>
        <div class="bg-title-thuc-don">
            <div class="title-thuc-don">
              Calo- <br>  Bữa ăn <span>khỏe</span>

            </div>
            <div class="about-thuc-don">
                Mỗi bữa ăn, sau khi nạp những protein, calo, năng lượng cho cơ thể bạn nhưng bạn lại không biết được số lượng mình nạp là bao nhiêu? Thì đây sẽ là
                một phương pháp nhỏ có thể giúp bạn tính được nguồn thực phẩm nạp vào cơ thể bạn.
              </div>
        </div>
      </div>

      <div class="bg-thuc-don-right" id="_menu_">
        <div class="row-handmake" >
          <div class="thucdon my-5">
            <div class="box_thucdon position-relative" id="box_thucdon_1">
              <table border=1 class="w-100" id="thucdon_1">
                <thead>
                  <th width="25%">Thực phẩm</th>
                  <th width="25%">Khối lượng (g)</th>
                  <th width="10%">Đạm (g)</th>
                  <th width="10%">Béo (g)</th>
                  <th width="10%">Tinh bột (g)</th>
                  <th width="10%">Calo</th>
                  <th width="10%">Điều khiển</th>
                </thead>
                <tbody id="body_thucdon_1">
                 
                </tbody>
              </table>
              <div class="controls_thucdon_1 bd-highlight">
                <button class="click_up_thucdon_1">Thêm thực phẩm</button>
                <button class="click_down_thucdon_1 removeAllRow">Xóa tất cả</button>
              </div>
            </div>

            <!-- kết quả -->
            <div class="ketqua-thucdon" id="thucdon_1_result mt-5">
                <table border="1" width="200px" id="result">
                  <thead>
                    <tr>
                      <th colspan="2">Tổng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td width="30%">Đạm</td>
                      <td class="thucdon_2_result_protein protein_total">...</td>
                    </tr>
                    <tr>
                      <td width="30%">Béo</td>
                      <td class="thucdon_2_result_fat fat_total">...</td>
                    </tr>
                    <tr>
                      <td width="30%">Tinh bột</td>
                      <td class="thucdon_2_result_carb carb_total">...</td>
                    </tr>
                    <tr>
                      <td width="30%">Calo</td>
                      <td class="thucdon_2_result_calo calo_total">...</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            <!-- kết quả -->
            <div class="download-thucdon">
                <button type="button" id="exportExcelButton">
                  Download excel
                </button>
                <button onclick="downloadtable();">
                  Download png
                </button>
              </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</article>

<script src="js/blog.js"></script>
<script src="js/thucdon.js"></script>
<script src="js/html2canvas.js"></script>