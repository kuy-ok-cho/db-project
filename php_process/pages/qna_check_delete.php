<?php

  if(!isset($_POST['item'])){
    echo "
      <script>
        alert('삭제할 게시글을 선택해 주세요.');
        history.go(-1);
      </script>
    ";
  } else {

  //database connect
  include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";

  for($i=0; $i<count($_POST['item']); $i++){
    $check_num=$_POST['item'][$i];
    $sql="delete from gold_qna where 	GOLD_QNA_num=$check_num";
    mysqli_query($dbConn, $sql);
  }

  echo "
    <script>
      alert('삭제가 완료되었습니다.');
      location.href='/gold/pages/admin/admin.php';
    </script>
  ";

  }

  // echo $_POST['item'][0];
  // echo $_POST['item'][1];
  // echo $_POST['item'][2];
?>