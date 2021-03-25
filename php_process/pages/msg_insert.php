<?php
  $msg_name=$_POST['msgName'];
  $msg_email=$_POST['msgEmail'];
  $msg_tit=$_POST['msgTit'];
  $msg_tit=addslashes($msg_tit);
  $msg_con=$_POST['msgTxt'];
  $msg_con=addslashes($msg_con);
  $msg_reg=date("Y-m-d H:i:s");

  //echo $msg_name, $msg_email, $msg_tit, $msg_con, $msg_reg;

  //database connect
  include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
  $sql="insert into gold_msg(
    GOLD_MSG_name,
    GOLD_MSG_email,
    GOLD_MSG_tit,
    GOLD_MSG_con,
    GOLD_MSG_reg
  ) values(
    '$msg_name',
    '$msg_email',
    '$msg_tit',
    '$msg_con',
    '$msg_reg'
  )";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('메시지가 전송되었습니다.');
      location.href='/gold/index.php';
    </script>
  ";
?>