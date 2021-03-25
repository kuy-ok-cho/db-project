<div class="qnaBoxes admin deWeBoxes">
            <div class="adminTable">
              <ul class="adminList">
                
                <li class="adminTitle clear">
                  <span class="msgNum">번호</span>
                  <span class="msgId">아이디</span>
                  <span class="msgTit">제목</span>
                  <span class="msgReg">등록일</span>
                  <span class="msgEmail">이메일</span>
                  <span class="msgDelete">삭제</span>
                </li>

                <?php
                $msg_search_select=$_POST['searchSelect'];
                $msg_search_input=$_POST['adminSearchInput'];

                //database connect
                include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";

                if($msg_search_select == 'adminSearchId'){
                  $sql="select * from gold_msg where GOLD_MSG_name LIKE '%$msg_search_input%' order by GOLD_MSG_num desc";
                } else {
                  $sql="select * from gold_msg where GOLD_MSG_tit LIKE '%$msg_search_input%' order by GOLD_MSG_num desc";
                }

                $msg_search_result=mysqli_query($dbConn, $sql);
                $search_result_num=mysqli_num_rows($msg_search_result);

                if(!$search_result_num){
                  echo '<li style="padding:10px; width:100%; text-align:center;">데이터가 존재하지 않습니다. 검색 조건 및 검색어를 확인해 주세요.</li>';
                } else {
                  while($search_result_row=mysqli_fetch_array($msg_search_result)){
                    $msg_result_num=$search_result_row['GOLD_MSG_num'];
                    $msg_result_id=$search_result_row['GOLD_MSG_name'];
                    $msg_result_tit=$search_result_row['GOLD_MSG_tit'];
                    $msg_result_reg=$search_result_row['GOLD_MSG_reg'];
                    $msg_result_email=$search_result_row['GOLD_MSG_email'];
                ?>

                <li class="adminContents clear">
                  <span class="msgNum"><?=$msg_result_num?></span>
                  <span class="msgId"><?=$msg_result_id?></span>
                  <span class="msgTit"><a href="/gold/pages/admin/admin_view.php?num=<?=$msg_result_num?>"><?=$msg_result_tit?></a></span>
                  <span class="msgReg"><?=$msg_result_reg?></span>
                  <span class="msgEmail"><?=$msg_result_email?></span>
                  <span class="msgDelete"><a href="/gold/php_process/pages/msg_delete.php?num=<?=$msg_result_num?>">삭제</a></span>
                </li>
                    
                <?php
                  }
                }
                ?>

              </ul>
            </div>
            <!-- end of qna table -->

            <div class="adminViewBtns">
              <a href="/gold/pages/admin/admin.php">뒤로가기</a>       
            </div>