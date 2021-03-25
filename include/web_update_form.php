          <?php
          $web_num=$_GET['num'];

          include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
          $sql="select * from gold_web where GOLD_WEB_num=$web_num";
          $web_result=mysqli_query($dbConn, $sql);
          $web_result_row=mysqli_fetch_array($web_result);

          $web_result_tit=$web_result_row['GOLD_WEB_tit'];
          $web_result_ser=$web_result_row['GOLD_WEB_ser'];
          $web_result_des=$web_result_row['GOLD_WEB_des'];
          $web_result_img=$web_result_row['GOLD_WEB_img'];
          $web_result_mimg=$web_result_row['GOLD_WEB_mimg'];
          $web_result_thumb=$web_result_row['GOLD_WEB_thumb'];
          $web_result_cli=$web_result_row['GOLD_WEB_cli'];
          $web_result_reg=$web_result_row['GOLD_WEB_reg'];
          $web_result_dom=$web_result_row['GOLD_WEB_dom'];
          ?>
          
          <!-- web input contents form -->
          <div class="webInputFrom webDesignInput">
            <form action="/gold/php_process/pages/web_update.php?num=<?=$web_num?>" method="post" name="web_form" enctype="multipart/form-data">
              <div class="titleSer clear">
                <p class="title_input">
                  <label for="title">Title</label>
                  <input type="text" placeholder="<?=$web_result_tit?>" id="title" name="web_title">
                </p>
                <p class="serial_input">
                  <label for="serial">SerialNo.</label>
                  <input type="text" placeholder="<?=$web_result_ser?>" id="serial" name="web_serial">
                </p>
                <p class="client_input">
                  <label for="client">Client</label>
                  <input type="text" placeholder="<?=$web_result_cli?>" id="client" name="web_client">
                </p>
                <p class="domain_input">
                  <label for="domain">Domain</label>
                  <input type="text" placeholder="<?=$web_result_dom?>" id="domain" name="web_domain">
                </p>
              </div>
              <!-- end of title, serial, client input  -->
              <div class="web_desc uploadDesc">
                <textarea name="web_desc">
                <?=$web_result_des?>
                </textarea>
              </div>
              <!-- end of text description -->
              <div class="uploadImgs clear">
                <div class="uploadBox img1">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$web_result_img?>">
                    <label for="mainImage">SELECT IMAGE</label>
                    <input type="file" id="mainImage" class="uploadHidden" name="main">
                  </div>
                  <div class="img1_box imgWrap">
                    <img id="img1" src="/gold/data/web_page/pc/<?=$web_result_img?>">
                  </div>
                </div>
                <div class="uploadBox img2">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$web_result_mimg?>">
                    <label for="subImage">SELECT IMAGE</label>
                    <input type="file" id="subImage" class="uploadHidden" name="mobile">
                  </div>
                  <div class="img2_box imgWrap">
                    <img id="img2" src="/gold/data/web_page/mobile/<?=$web_result_mimg?>">
                  </div>
                </div>
                <div class="uploadBox img3">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$web_result_thumb?>">
                    <label for="thumImage">SELECT IMAGE</label>
                    <input type="file" id="thumImage" class="uploadHidden" name="thumbnail">
                  </div>
                  <div class="thumb_box imgWrap">
                    <img id="thumb" src="/gold/data/web_page/thumb/<?=$web_result_thumb?>">
                  </div>
                </div>
              </div>
              <!-- end of image upload box -->
            </form>
          </div>
          <!-- end of designInputFrom -->

          <div class="btns">
            <button type="button" class="commonBtn" id="submitBtn" onclick="updateSubmit()">UPDATE</button>
          </div>

          <script>
            function updateSubmit(){
              document.web_form.submit();
            }
          </script>