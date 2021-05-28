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
        <div class="boxcenter thucdon my-5">
          <div class="box_thucdon position-relative" id="box_thucdon_1">
            <table border=1 class="w-100" id="thucdon_1">
              <thead>
                <th width="10%">Thực phẩm</th>
                <th width="10%">Khối lượng (g)</th>
                <th width="10%">Đạm (g)</th>
                <th width="10%">Béo (g)</th>
                <th width="10%">Tinh bột (g)</th>
                <th width="10%">Calo</th>
              </thead>
              <tbody id="body_thucdon_1">
                <tr>
                  <td>
                    <select name="" id="">
                      <option value="1">Ức gà không da</option>
                      <option value="2">Chuối vàng</option>
                      <option value="3">Cá ngừ</option>
                      <option value="4">Gạo lức</option>
                    </select>
                  </td>
                  <td>
                    <input type="number" name="" id="khoithuc_1" placeholder="Gram">
                  </td>
                  <td class="protein_1">24</td>
                  <td class="fat_1">...</td>
                  <td class="carb_1">...</td>
                  <td class="calo_1">130</td>
                </tr>
              </tbody>
            </table>
            <div class="controls_thucdon_1 d-flex flex-row-reverse bd-highlight">
              <button class="click_down_thucdon_1">-</button>
              <button class="click_up_thucdon_1">+</button>
            </div>
            <div id="thucdon_1_result mt-5">
              <table border="1" width="200px">
                <thead>
                  <tr>
                    <th colspan="2">Tổng</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="30%">Đạm</td>
                    <td class="thucdon_2_result_protein">...</td>
                  </tr>
                  <tr>
                    <td width="30%">Béo</td>
                    <td class="thucdon_2_result_fat">...</td>
                  </tr>
                  <tr>
                    <td width="30%">Tinh bột</td>
                    <td class="thucdon_2_result_carb">...</td>
                  </tr>
                  <tr>
                    <td width="30%">Calo</td>
                    <td class="thucdon_2_result_calo">...</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div>
              <button>
                Download excel
              </button>
              <button>
                Download png
              </button>
            </div>
          </div>

        </div>
        <!-- /blog -->
    </article>

<script src="js/blog.js"></script>

<script src="js/thucdon.js"></script>
