<?php

  session_start();
  unset($_SESSION['userid']);
  unset($_SESSION["userlevel"]);

  echo "
    <script>
      location.href='/gold/index.php';
    </script>
  ";

?>