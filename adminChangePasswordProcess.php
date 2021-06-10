<?php
session_start();
if(
        isset($_SESSION['admin_ID'])
    &&  !empty($_SESSION['admin_ID'])
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
              $id=$_SESSION['admin_ID'];
              try{
                    $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $loginQuery="SELECT * from adminprofile WHERE admin_ID=$id";
                    $returnobj=$conn->query($loginQuery);

                    $temp_profile = $returnobj->fetch();   //Fetching a single row then signle column, single value

                    $pass_db=$temp_profile['admin_password'];
                    
                    if($oldPassIn==$pass_db){
                        
                        $changePassQuery="UPDATE adminprofile SET admin_password='$newPass' WHERE admin_ID=$id";
                        $conn->exec($changePassQuery);

                        ?>
                          <script>location.assign("adminHome.php");</script>
                        <?php
                    }
                    else{
                        //old password not match
                        ?>
                        <script>location.assign("adminChangePassword.php");</script>
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
          <script>location.assign("adminChangePassword.php");</script>
          <?php
        }
    }
    else{
      //for other method we'll forward user to the changePass page
      ?>
      <script>location.assign("adminChangePassword.php");</script>
      <?php
    }
}
else{
  //$_SEESION variable isn't set and/or $_SESSION variable is empty
  ?>
    <script>location.assign("adminLogin.php");</script>
  <?php
}
?>
