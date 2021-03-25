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

    <!-- qna css link -->
    <link rel="stylesheet" href="/gold/css/qna.css">

    <!-- animation css link -->
    <link rel="stylesheet" href="/gold/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/gold/css/media.css" />
  </head>
  <body>
    <div class="wrap">
      
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/header.php" ?>

      <section class="contents qna hasTitle">
        <div class="center">
          <!-- contact title -->
          <div class="title">
            <h2>Your Inquiry</h2>
            <div class="subTit">
              <span class="subLine"></span>
              <a href="#" class="subLink">View More Details</a>
            </div>
          </div>
          <!-- end of contact title -->

          <div class="qnaBoxes deWeBoxes">
            <div class="qnaTable">
              <ul class="qnaList">
                
              <!-- ajax code inside here -->

              </ul>
            </div>
            <!-- end of qna table -->

            <div class="searchPaging clear">
              <div class="search">
                <form action="/gold/pages/qna/qna_search_result.php" method="post" name="qnaSearch" class="clear qnaSearch">
                  <select name="searchSelect" id="" class="searchSelect">
                    <option value="qnaSearchId">아이디</option>
                    <option value="qnaSearchTitle">제목</option>
                  </select>
                  <input type="text" name="qnaSearchInput" placeholder="검색어를 입력해 주세요" class="qnaSearchInput">
                  <button type="button" class="qnaSearchBtn"><i class="fa fa-search" onclick="search_check()"></i></button>
                  <script>
                    function search_check(){
                      if(!document.qnaSearch.qnaSearchInput.value){
                        alert('검색어를 입력해 주세요.');
                        document.qnaSearch.qnaSearchInput.focus();
                        return;
                      }
                      document.qnaSearch.submit();
                    }
                  </script>
                </form>
              </div>
              <div class="paging">
                <span class="firstPg" onclick="firstPage()"><i class="fa fa-angle-double-left"></i></span>
                <span class="prevPg" onclick="goPrev()"><i class="fa fa-angle-left"></i></span>

                <?php
                //database connect
                include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
                $sql="select * from gold_qna order by GOLD_QNA_num desc";

                $paging_result=mysqli_query($dbConn, $sql);
                $total_record=mysqli_num_rows($paging_result);
                $scale=5;

                if($total_record % $scale == 0){
                  $total_page=floor($total_record/$scale);
                } else {
                  $total_page=floor($total_record/$scale) + 1;
                }

                for($i=1; $i<=$total_page; $i++){
                ?>

                <span class="PgNum" onclick="getPage(<?=$i?>)"><?=$i?></span>

                <?php
                }
                ?>

                <span class="nextPg" onclick="goNext()"><i class="fa fa-angle-right"></i></span>
                <span class="lastPg" onclick="lastPage()"><i class="fa fa-angle-double-right"></i></span>
              </div>
            </div>
            <!-- end of search paging -->

            <div class="writeBox clear">
              <div class="qnaGuide">
                <span>글쓰기</span>
                <?php
                if($userid==''){
                ?>
                <span><a href="/gold/pages/login/login_form.php">로그인</a></span>
                <?php
                } else {
                ?>
                <span><?=$userid?></span>
                <?php
                }
                ?>
                
              </div>
              <form action="/gold/php_process/pages/qna_insert.php?id=<?=$userid?>" method="post" class="writeForm" name="writeForm">
                <p class="qnaTitInput">
                  <label for="qnaTitle">제목</label>
                  <input type="text" name="qnaTitle" id="qnaTitle" placeholder="제목을 입력해 주세요.">
                </p>
                <p class="qnaTxtInput">
                  <textarea name="qnaTxt" placeholder="내용을 입력해 주세요"></textarea>
                </p>
              </form>
              <?php
              if($userid==''){
              ?>
              <button type="submit" onclick="plzLogin()">등록</button>
              <?php
              } else {
              ?>
              <button type="submit" class="qnaSubmit">등록</button>
              <?php
              }
              ?>
            </div>

          </div> 

        </div>
        <!-- end of center -->
  
      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/gold/js/custom.js"></script>
    <script src="/gold/js/web_design_page.js"></script>
    <script src="/gold/js/qna_ajax.js"></script>
    <script>
      const qnaSubmit = document.querySelector(".qnaSubmit");
      qnaSubmit.addEventListener('click', insertQan);

      function plzLogin(){
        alert('글쓰기를 하시려면 로그인이 필요합니다.');
      }

      function insertQan(){
        if(!document.writeForm.qnaTitle.value){
          alert("제목을 입력해 주세요.");
          document.writeForm.qnaTitle.focus();
          return;
        }

        if(!document.writeForm.qnaTxt.value){
          alert("내용을 입력해 주세요.");
          document.writeForm.qnaTxt.focus();
          return;
        }

        document.writeForm.submit();
      }

      
    </script>
  </body>
</html>
