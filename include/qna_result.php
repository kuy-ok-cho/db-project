          <div class="qnaTab admin deWeBoxes">
            <div class="adminTable">
              <ul class="adminList">
                <li class="adminTitle clear">
                  <span class="qnaCheck">선택</span>
                  <span class="qnaNum">번호</span>
                  <span class="qnaId">아이디</span>
                  <span class="qnaTit">제목</span>
                  <span class="qnaReg">등록일</span>
                  <span class="qnaHit">조회수</span>
                </li>

                <form action="/gold/php_process/pages/qna_check_delete.php" method="get" name="adminQnaDelete">

                <?php
                $qna_search_select=$_POST['searchSelect'];
                $qna_search_input=$_POST['qnaSearchInput'];

                //database connect
                include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";

                if($qna_search_select == 'qnaSearchId'){
                  $sql="select * from gold_qna where GOLD_QNA_id LIKE '%$qna_search_input%' order by GOLD_QNA_num desc";
                } else {
                  $sql="select * from gold_qna where GOLD_QNA_tit LIKE '%$qna_search_input%' order by GOLD_QNA_num desc";
                }

                $qna_search_result=mysqli_query($dbConn, $sql);
                $search_result_num=mysqli_num_rows($qna_search_result);

                if(!$search_result_num){
                  echo '<li style="padding:10px; width:100%; text-align:center;">데이터가 존재하지 않습니다. 검색 조건 및 검색어를 확인해 주세요.</li>';
                } else {
                  while($qna_row = mysqli_fetch_array($qna_search_result)){
                    $qna_res_num = $qna_row['GOLD_QNA_num'];
                    $qna_res_id = $qna_row['GOLD_QNA_id'];
                    $qna_res_tit = $qna_row['GOLD_QNA_tit'];
                    $qna_res_reg = $qna_row['GOLD_QNA_reg'];
                    $qna_res_hit = $qna_row['GOLD_QNA_hit'];
                ?>

                <li class="adminContents clear">
                  <span class="qnaCheck"><input type="checkbox" name="item[]" value="<?=$qna_res_num?>"></span>
                  <span class="qnaNum"><?=$qna_res_num?></span>
                  <span class="qnaId"><?=$qna_res_id?></span>

                  <?php
                  $sql="select * from gold_ans where GOLD_ANS_QNA_num=$qna_res_num order by GOLD_ANS_num desc";

                  $ans_res=mysqli_query($dbConn, $sql);
                  $is_ans_res=mysqli_num_rows($ans_res);

                  if(!$is_ans_res){
                  ?>

                  <span class="qnaTit"><a href="/gold/pages/qna/qna_view.php?num=<?=$qna_res_num?>"><?=$qna_res_tit?></a></span>

                  <?php
                  } else {
                  ?>

                  <span class="qnaTit"><a href="/gold/pages/qna/qna_view.php?num=<?=$qna_res_num?>"><?=$qna_res_tit?> [답변완료]</a></span>

                  <?php
                  }
                  ?>

                  <span class="qnaReg"><?=$qna_res_reg?></span>
                  <span class="qnaHit"><?=$qna_res_hit?></span>
                </li>

                <?php
                  }
                }
                ?>

              </form>
              </ul>
            </div>
            <!-- end of admin table -->
            <div class="qnaResultBtns">
              <button type="button" onclick="qnaCheckDelete()">선택삭제</button>
              <button type="button" onclick="history.go(-1)">돌아가기</button>
            </div>
          </div>
          <script>
            function qnaCheckDelete(){
              document.adminQnaDelete.submit();
            }
          </script>