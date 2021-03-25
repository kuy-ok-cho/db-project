<?php
  $web_delete_num=$_GET['num'];

  include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
  $sql="delete from gold_web where GOLD_WEB_num =$web_delete_num";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('삭제가 완료되었습니다.');
      location.href='/gold/pages/web/web.php';
    </script>
  ";
?>