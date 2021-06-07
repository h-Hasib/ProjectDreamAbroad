<?php
session_start();
if(
        isset($_SESSION['userID'])
    &&  !empty($_SESSION['userID'])
){
  //user already logged in
  unset($_SESSION['userID']);
  session_destroy();
  ?>
    <script>location.assign("login.php");</script>
  <?php
}
else{
  //$_SEESION variable isn't set and/or $_SESSION variable is empty
  ?>
    <script>location.assign("login.php");</script>
  <?php
}

?>
