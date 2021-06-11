<?php
//List of variable firstName, lastName, gender, userEmail,phoneNumber, userPass1, userPass2, profilePic, termsAgreement
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(
            isset($_POST['firstName'])
        &&  isset($_POST['lastName'])
        &&  isset($_POST['gender'])
        &&  isset($_POST['userEmail'])
        &&  isset($_POST['phoneNumber'])
        &&  isset($_POST['userPass1'])
        &&  !empty($_POST['firstName'])
        &&  !empty($_POST['lastName'])
        &&  !empty($_POST['gender'])
        &&  !empty($_POST['userEmail'])
        &&  !empty($_POST['phoneNumber'])
        &&  !empty($_POST['userPass1'])
      ){
          $firstName=$_POST['firstName'];
          $lastName=$_POST['lastName'];
          $gender=$_POST['gender'];
          $email=$_POST['userEmail'];
          $phone=$_POST['phoneNumber'];
          $pass=$_POST['userPass1'];

          try{
                $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $enc_password=md5($pass); //Password encryption

                $mysql_query_reg="INSERT INTO userprofile (firstName,lastName,email,password,gender,phoneNumber)
                                    VALUES ('$firstName','$lastName','$email','$enc_password','$gender','$phone')";
                $conn->exec($mysql_query_reg);

                //if the insertion success , forward to login page
                $id_serach_Query="SELECT * from userprofile WHERE email='$email' && password='$enc_password'";
                $returnobj=$conn->query($id_serach_Query);
                $temp = $returnobj->fetch();   //Fetching a single row then signle column, single value
                //$fName = $temp['firstName'];
                $userID = $temp['userID'];
                $conn->exec("INSERT INTO address (userProfile_userID) VALUES ($userID);");
                $conn->exec("INSERT INTO education (userProfile_userID) VALUES ($userID);");  //joining with these two table for further search
                ?>
                  <script>location.assign("login.php");</script>
                <?php
            }
            catch(PDOException $ex){
              //if database connection issue then forward to registration page
              ?>
                <script>location.assign("reg.php");</script>
              <?php
            }
    }
    else{
      //if fields aren't set and empty forward to register
      ?>
        <script>location.assign("reg.php");</script>
      <?php
    }
}
else{
  //for other method we'll forward user to the register page
  ?>
  <script>location.assign("reg.php");</script>
  <?php
}
?>
