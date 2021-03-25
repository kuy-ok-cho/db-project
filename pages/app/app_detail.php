<?php
  $app_detail_num = $_GET['num'];

  include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
  $sql="select * from gold_app where GOLD_APP_num=$app_detail_num";

  $app_result=mysqli_query($dbConn, $sql);
  $app_row=mysqli_fetch_array($app_result);

  $app_detail_tit=$app_row['GOLD_APP_tit'];
  $app_detail_ser=$app_row['GOLD_APP_ser'];
  $app_detail_des=$app_row['GOLD_APP_des'];
  $app_detail_img=$app_row['GOLD_APP_img'];
  // $web_detail_mImg=$web_row['GOLD_WEB_mimg'];
  // // $design_detail_thumb=$row['GOLD_DE_thumb'];
  $app_detail_cli=$app_row['GOLD_APP_cli'];
  $app_detail_reg=$app_row['GOLD_APP_reg'];

  // //echo $design_detail_tit, $design_detail_ser, $design_detail_des, $design_detail_img1, $design_detail_img2, $design_detail_thumb, $design_detail_cli, $design_detail_reg;
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

    <!-- light slider plugin link -->
    <link rel="stylesheet" href="/gold/plugin/lightslider.css" />

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

      <section class="contents appDetail deWeDetail">
        <div class="center clear">
          <div class="appLeft deWeLeft">
            <!-- title width common style -->
            <div class="title">
              <h2><?=$app_detail_tit?></h2>
              <div class="linkBox">
                <span class="line"></span>
                <a href="/gold/pages/app/app.php">view all website</a>
              </div>
            </div>
            <!-- end of common title -->

            <div class="detailCon">
              
              <div class="appFramebox">
                <ul id="appMain" class="appMain">
                  <li>
                    <img src="/gold/data/app_page/app_main/<?=$app_detail_img?>" alt="">
                  </li>
                  <li>
                    <img src="/gold/data/app_page/app_main/app_main_005.png" alt="">
                  </li>
                  <li>
                    <img src="/gold/data/app_page/app_main/app_main_006.png" alt="">
                  </li>
                </ul>
                <span class="frameTop"></span>
                <span class="frameLeft"></span>
                <span class="frameRight"></span>
                <span class="frameBottom"></span>
              </div>

              <div class="appStoreBtns">
                <a href="#"><img src="/gold/img/app_store.jpg" alt=""></a>
                <a href="#"><img src="/gold/img/google_play.jpg" alt=""></a>
              </div>

              <p class="detailInfo">
                Projected By Gold Dev. Team / <?=$app_detail_ser?> / Used in <?=$app_detail_cli?> / <?=$app_detail_reg?>
              </p>

              <div class="detailDesc">
                <p><?=$app_detail_des?></p>
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
                <button type="button" onclick="location.href='/gold/pages/admin/update_product.php?key=app_update_form&num=<?=$app_detail_num?>'">수정</button>
                <button type="button" onclick="confirmDel()">삭제</button>
              </div>
              <?php
              }
              ?>
            </div>
            <script>
              function confirmDel(){
                let confirmCheck = confirm('정말로 삭제하시겠습니까?')
                if(confirmCheck == false){
                  return false;
                } else {
                  location.href='/gold/php_process/pages/app_detail_delete.php?num=<?=$app_detail_num?>';
                }            
              }
            </script>
            <!-- end of web detail contents -->
          </div>
          <!-- end of left box -->
          <div class="appRight deWeRight">
            
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
    <script src="/gold/plugin/lightslider.js"></script>
    <script src="/gold/js/custom.js"></script>
    <script src="/gold/js/web_detail.js"></script>
    <script>
      $(function(){
        //lightslider documentation : http://sachinchoolur.github.io/lightslider/examples.html
        //lightslider 옵션 참조 : https://sseung-fire.tistory.com/18

        $(".lSAction").empty();

        $("#appMain").lightSlider({
          loop:true,
          keyPress:true,
          item:1,
          auto:true,
          speed:500,
          controls:false
        }); 
      });
    </script>
  </body>
</html>



