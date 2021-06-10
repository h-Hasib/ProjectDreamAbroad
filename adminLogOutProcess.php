<?php
session_start();
if(
        isset($_SESSION['admin_ID'])
    &&  !empty($_SESSION['admin_ID'])
){
  //user already logged in
  unset($_SESSION['admin_ID']);
  session_destroy();
  ?>
    <script>location.assign("adminLogin.php");</script>
  <?php
}
else{
  //$_SEESION variable isn't set and/or $_SESSION variable is empty
  ?>
    <script>location.assign("adminLogin.php");</script>
  <?php
}

?>
