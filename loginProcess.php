<!-- variable userEmail, userPass -->
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(
          isset($_POST['userEmail'])
      &&  isset($_POST['userPass'])
      &&  !empty($_POST['userEmail'])
      &&  !empty($_POST['userPass'])
    ){
        $email = $_POST['userEmail'];
        $pass = $_POST['userPass'];
        try{
              $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $enc_password=md5($pass); //Password encryption

              $loginQuery="SELECT * from userprofile WHERE email='$email' && password='$enc_password'";
              $returnobj=$conn->query($loginQuery);
              $temp = $returnobj->fetch();   //Fetching a single row then signle column, single value
              //$fName = $temp['firstName'];
              $userID = $temp['userID'];
              if($returnobj->rowCount()==1){
                  session_start();
                  $_SESSION['userID']=$userID;
                  ?>
                    <script>location.assign("home.php");</script>
                  <?php
              }
              else{
                  ?>
                    <script>location.assign("login.php");</script>
                  <?php
              }
        }
        catch(PDOException $ex){
          ?>
            <script>location.assign("login.php");</script>
          <?php
        }
  }
  else{
    //if fields aren't set and empty
    ?>
      <script>location.assign("login.php");</script>
    <?php
  }
}
else{
  //for other method we'll forward user to the register page
  ?>
  <script>location.assign("login.php");</script>
  <?php
}
?>
