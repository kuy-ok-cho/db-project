<?php
  //get 변수로 주소의 아이디 값 저장
  $check_id = $_GET['id'];

  if(!$check_id){
    echo "아이디를 입력해 주세요.";
  } else {
    include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
    $sql="select * from gold_mem where GOLD_mem_id='$check_id'";
    $result = mysqli_query($dbConn, $sql);
    $num_record = mysqli_num_rows($result);
    if($num_record){
      echo $check_id."는(은) 존재하는 아이디 입니다. \n다른 아이디를 사용해 주세요.";
    } else {
      echo $check_id."는(은) 사용할 수 있는 아이디 입니다.";
    }
  }
?>