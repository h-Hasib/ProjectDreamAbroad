<?php
session_start();
if(
        isset($_SESSION['userID'])
    &&  !empty($_SESSION['userID'])
){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      if(
              isset($_POST['currentPass'])
          &&  isset($_POST['newPass'])
          &&  !empty($_POST['currentPass'])
          &&  !empty($_POST['newPass'])
        ){
              //user already logged in
              $oldPassIn=$_POST['currentPass'];
              $newPass=$_POST['newPass'];
              $id=$_SESSION['userID'];
              try{
                    $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $loginQuery="SELECT * from userprofile WHERE userID=$id";
                    $returnobj=$conn->query($loginQuery);

                    $temp_profile = $returnobj->fetch();   //Fetching a single row then signle column, single value

                    $enc_pass_db=$temp_profile['password'];
                    $enc_pass_old=md5($oldPassIn); //Password encryption

                    if($enc_pass_old==$enc_pass_db){
                        $enc_pass_new=md5($newPass);
                        $changePassQuery="UPDATE userprofile SET password='$enc_pass_new' WHERE userID=$id";
                        $conn->exec($changePassQuery);

                        ?>
                          <script>location.assign("home.php");</script>
                        <?php
                    }
                    else{
                        //old password not match
                        ?>
                        <script>location.assign("changePassword.php");</script>
                        <?php
                    }
              }
              catch(PDOException $e){
                    echo 'Connection failed: ' . $e->getMessage();
              }
        }
        else{
          //for not setted paass value forward user to the changePass page
          ?>
          <script>location.assign("changePassword.php");</script>
          <?php
        }
    }
    else{
      //for other method we'll forward user to the changePass page
      ?>
      <script>location.assign("changePassword.php");</script>
      <?php
    }
}
else{
  //$_SEESION variable isn't set and/or $_SESSION variable is empty
  ?>
    <script>location.assign("login.php");</script>
  <?php
}
?>
