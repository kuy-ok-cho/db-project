<?php
  $member_id = $_POST['id'];
  $name = $_POST['name'];
  $member_pass = $_POST['pass'];

  $email1 = $_POST['email1'];
  $email2 = $_POST['email2'];

  $email = $email1."@".$email2;

  $regist_day = date("Y-m-d H:i:s");
  $level = 9;
  $point = 0;

  //echo $id, $name, $pass, $email, $regist_day, $level, $point;

  include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
  $sql = "insert into gold_mem(GOLD_mem_id, GOLD_mem_name, GOLD_mem_email, GOLD_mem_pass, GOLD_mem_regi_day, GOLD_mem_level, GOLD_mem_point) values('$member_id', '$name', '$email', '$member_pass', '$regist_day', '$level', '$point')";

  mysqli_query($dbConn, $sql);

  echo "
    <script>  
      location.href='/gold/index.php';
    </script>
  ";

?>