<?php
  $msg_num=$_GET['num'];

  //database connect
  include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
  $sql="delete from gold_msg where GOLD_MSG_num=$msg_num";
  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('삭제가 완료되었습니다.');
      location.href='/gold/pages/admin/admin.php';
    </script>
  ";

?>