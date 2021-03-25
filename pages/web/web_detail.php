<?php
  $web_detail_num = $_GET['num'];

  include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
  $sql="select * from gold_web where GOLD_WEB_num=$web_detail_num";

  $web_result=mysqli_query($dbConn, $sql);
  $web_row=mysqli_fetch_array($web_result);

  $web_detail_tit=$web_row['GOLD_WEB_tit'];
  $web_detail_ser=$web_row['GOLD_WEB_ser'];
  $web_detail_des=$web_row['GOLD_WEB_des'];
  $web_detail_img=$web_row['GOLD_WEB_img'];
  $web_detail_mImg=$web_row['GOLD_WEB_mimg'];
  // $design_detail_thumb=$row['GOLD_DE_thumb'];
  $web_detail_cli=$web_row['GOLD_WEB_cli'];
  $web_detail_reg=$web_row['GOLD_WEB_reg'];

  //echo $design_detail_tit, $design_detail_ser, $design_detail_des, $design_detail_img1, $design_detail_img2, $design_detail_thumb, $design_detail_cli, $design_detail_reg;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gold</title>

    <!-- font awesome link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- main style css link -->
    <link rel="stylesheet" href="/gold/css/style.css" />

    <!-- design css link -->
    <link rel="stylesheet" href="/gold/css/design_web_app.css">

    <!-- animation css link -->
    <link rel="stylesheet" href="/gold/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/gold/css/media.css" />
  </head>
  <body>
    <div class="wrap">
      
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/header.php" ?>

      <section class="contents webDetail deWeDetail">
        <div class="center clear">
          <div class="webLeft deWeLeft">
            <!-- title width common style -->
            <div class="title">
              <h2><?=$web_detail_tit?></h2>
              <div class="linkBox">
                <span class="line"></span>
                <a href="/gold/pages/web/web.php">view all website</a>
              </div>
            </div>
            <!-- end of common title -->

            <div class="detailCon">
              <div class="webTabBtns">
                <button type="button">PC</button>
                <button type="button">MOBILE</button>
              </div>

              <div class="webBox webTab">
                
                <div class="webPcFrame">     

                  <div class="webMainImg">
                    <img src="/gold/data/web_page/pc/<?=$web_detail_img?>" alt="" class="scrollUp">
                  </div>

                  <img src="/gold/img/mac_frame.png" alt="">
                </div>

              </div>
              <!-- end of pc web box -->
              <div class="webBox_m webTab">
                <div class="webMobileFrame">           
                  <div class="webMainImg_m">
                    <img src="/gold/data/web_page/mobile/<?=$web_detail_mImg?>" alt="" class="scrollUp_m">
                  </div>
                  <img src="/gold/img/iphone_frame.png" alt="">
                </div>
              </div>
              <!-- end of mobile web box -->

              <p class="detailInfo">
                Projected By Gold Dev. Team / <?=$web_detail_ser?> / Used in <?=$web_detail_cli?> / <?=$web_detail_reg?>
              </p>

              <div class="detailDesc">
                <p><?=$web_detail_des?></p>
                <a href="/gold/index.php#contact"><i class="fa fa-arrow-right"></i>Get In Touch With...</a>
              </div>

              <?php
              if($userlevel != 1){
              ?>
              <input type="hidden">
              <?php
              } else {
              ?>
              <div class="productAdminBtns">
                <button type="button" onclick="location.href='/gold/pages/admin/update_product.php?key=web_update_form&num=<?=$web_detail_num?>'">수정</button>
                <button type="button" onclick="confirmDel()">삭제</button>
              </div>
              <?php
              }
              ?>
            </div>
            <!-- end of web detail contents -->

            <script>
              function confirmDel(){
                let confirmCheck = confirm('정말로 삭제하시겠습니까?')
                if(confirmCheck == false){
                  return false;
                } else {
                  location.href='/gold/php_process/pages/web_detail_delete.php?num=<?=$web_detail_num?>';
                }            
              }
            </script>
          </div>
          <!-- end of left box -->
          <div class="designRight deWeRight">
            
          <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/web_side_detail.php" ?>
          <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/app_side_detail.php" ?>
            
          </div>
          <!-- end of right box -->

        </div>
        <!-- end of center -->
  
      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/gold/js/custom.js"></script>
    <script src="/gold/js/web_detail.js"></script>
  </body>
</html>
