          <?php
          $app_num=$_GET['num'];
          //echo $design_num;

          include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
          $sql="select * from gold_app where GOLD_APP_num=$app_num";
          $app_result=mysqli_query($dbConn, $sql);
          $app_result_row=mysqli_fetch_array($app_result);

          $app_result_tit=$app_result_row['GOLD_APP_tit'];
          $app_result_ser=$app_result_row['GOLD_APP_ser'];
          $app_result_des=$app_result_row['GOLD_APP_des'];
          $app_result_img1=$app_result_row['GOLD_APP_img'];
          $app_result_img2=$app_result_row['GOLD_APP_thumb'];
          $app_result_cli=$app_result_row['GOLD_APP_cli'];
          $app_result_reg=$app_result_row['GOLD_APP_reg'];
          ?>
          
          <!-- app input contents form -->
          <div class="designInputFrom webDesignInput">
            <form action="/gold/php_process/pages/app_update.php?num=<?=$app_num?>" method="post" name="app_form" enctype="multipart/form-data">
              <div class="titleSer clear">
                <p class="title_input">
                  <label for="title">Title</label>
                  <input type="text" placeholder="<?=$app_result_tit?>" id="title" name="app_title">
                </p>
                <p class="serial_input">
                  <label for="serial">SerialNo.</label>
                  <input type="text" placeholder="<?=$app_result_ser?>" id="serial" name="app_serial">
                </p>
                <p class="client_input">
                  <label for="client">Client</label>
                  <input type="text" placeholder="<?=$app_result_cli?>" id="client" name="app_client">
                </p>
              </div>
              <!-- end of title, serial, client input  -->
              <div class="app_desc uploadDesc">
                <textarea name="app_desc"><?=$app_result_des?></textarea>
              </div>
              <!-- end of text description -->
              <div class="uploadImgs clear">
                <div class="uploadBox appImg img1">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$app_result_img1?>">
                    <label for="mainImage">SELECT IMAGE</label>
                    <input type="file" id="mainImage" class="uploadHidden" name="app_main">
                  </div>
                  <div class="img1_box imgWrap">
                    <img id="img1" src="/gold/data/app_page/app_main/<?=$app_result_img1?>">
                  </div>
                </div>
                <div class="uploadBox appImg img2">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$app_result_img2?>">
                    <label for="subImage">SELECT IMAGE</label>
                    <input type="file" id="subImage" class="uploadHidden" name="app_sub">
                  </div>
                  <div class="img2_box imgWrap">
                    <img id="img2" src="/gold/data/app_page/app_thumb/<?=$app_result_img2?>">
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
              document.app_form.submit();
            }
          </script>