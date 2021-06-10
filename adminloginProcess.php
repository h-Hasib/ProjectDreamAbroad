<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(
          isset($_POST['adminEmail'])
      &&  isset($_POST['adminPass'])
      &&  !empty($_POST['adminEmail'])
      &&  !empty($_POST['adminPass'])
    ){
        $email = $_POST['adminEmail'];
        $pass = $_POST['adminPass'];
        try{
              $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


              $loginQuery="SELECT * from adminprofile WHERE admin_email='$email' && admin_password='$pass'";
              $returnobj=$conn->query($loginQuery);
              $temp = $returnobj->fetch();   //Fetching a single row then signle column, single value
              //$fName = $temp['firstName'];
              $admin_ID = $temp['admin_ID'];
              if($returnobj->rowCount()==1){
                  session_start();
                  $_SESSION['admin_ID']=$admin_ID;
                  ?>
                    <script>location.assign("adminHome.php");</script>
                  <?php
              }
              else{
                  ?>
                    <script>location.assign("adminlogin.php");</script>
                  <?php
              }
        }
        catch(PDOException $ex){
          ?>
            <script>location.assign("adminlogin.php");</script>
          <?php
        }
  }
  else{
    //if fields aren't set and empty
    ?>
      <script>location.assign("adminlogin.php");</script>
    <?php
  }
}
else{
  //for other method we'll forward user to the register page
  ?>
  <script>location.assign("adminlogin.php");</script>
  <?php
}
?>
