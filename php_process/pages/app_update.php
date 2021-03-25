<?php
$app_update_num=$_REQUEST['num'];

$app_title = nl2br($_REQUEST['app_title']);
$app_title = addslashes($app_title);
$app_serial = $_REQUEST['app_serial'];
$app_client = $_REQUEST['app_client'];
$app_desc = nl2br($_REQUEST['app_desc']);
$app_desc = addslashes($app_desc);
$regist_day =  date("Y-m-d");

$img_upload_dir = $_SERVER['DOCUMENT_ROOT'].'/gold/data/app_page/app_main/';
$thumb_upload_dir = $_SERVER['DOCUMENT_ROOT'].'/gold/data/app_page/app_thumb/';

//main image
$main_name = $_FILES['app_main']['name'];
$main_tmp_name = $_FILES['app_main']['tmp_name'];
$main_error = $_FILES['app_main']['error'];

//sub image
$sub_name = $_FILES['app_sub']['name'];
$sub_tmp_name = $_FILES['app_sub']['tmp_name'];
$sub_error = $_FILES['app_sub']['error'];

//main image upload
if($main_name && !$main_error){
  $uploaded_main_file = $img_upload_dir.$main_name;
  if(!move_uploaded_file($main_tmp_name, $uploaded_main_file)){
    echo "
      <script>
        alert('사진이 업로드 되지 않았습니다!');
      </script>
    ";
    exit;
  }
} else {
  $main_name = '';
}

//sub image upload
if($sub_name && !$sub_error){
  $uploaded_sub_file = $thumb_upload_dir.$sub_name;
  if(!move_uploaded_file($sub_tmp_name, $uploaded_sub_file)){
    echo "
      <script>
        alert('사진이 업로드 되지 않았습니다!');
      </script>
    ";
    exit;
  }
} else {
  $sub_name = '';
}

//database connect
include $_SERVER['DOCUMENT_ROOT']."/gold/php_process/connect/db_connect.php";
$sql="update gold_app set GOLD_APP_tit='$app_title', GOLD_APP_ser='$app_serial', 	GOLD_APP_des='$app_desc', GOLD_APP_img='$main_name', GOLD_APP_thumb='$sub_name', GOLD_APP_cli='$app_client', GOLD_APP_reg='$regist_day' where GOLD_APP_num=$app_update_num";

mysqli_query($dbConn, $sql);

$sql="select * from gold_app order by GOLD_APP_num desc";

$app_result = mysqli_query($dbConn, $sql);
  
  $arr_result = array();

  while($app_row = mysqli_fetch_array($app_result)){
    array_push($arr_result, array(
      'appnum' => $app_row['GOLD_APP_num'],
      'apptitle' => $app_row['GOLD_APP_tit'],
      'appser' => $app_row['GOLD_APP_ser'],
      'appdes' => $app_row['GOLD_APP_des'],
      'appmain' => $app_row['GOLD_APP_img'],
      'appthumb' => $app_row['GOLD_APP_thumb'],
      'appclient' => $app_row['GOLD_APP_cli'],
      'appreg' => $app_row['GOLD_APP_reg']
    ));
  }

  //make json file
  file_put_contents($_SERVER['DOCUMENT_ROOT'].'/gold/data/json/app.json', json_encode($arr_result, JSON_PRETTY_PRINT));

  echo "
    <script>
      alert('수정이 완료되었습니다.');
      location.href='/gold/pages/app/app.php';
    </script>
  ";
?>