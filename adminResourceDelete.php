<?php
session_start();
if(
        isset($_SESSION['admin_ID'])
    &&  !empty($_SESSION['admin_ID'])
){
  //user already logged in
    $resource_ID = $_GET['res_id'];
    try{
        $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //Query to fetch a single element-value from database
        $sqlQuery = $conn->query("SELECT pdfPath, imagePath FROM resources WHERE resource_ID= $resource_ID");
        $temp = $sqlQuery->fetch();
        $imagepath = $temp['imagePath'];  //delete an image from localserver when it deleted from the website
        $pdfpath = $temp['pdfPath'];
        $mysql_query_string="DELETE FROM resources WHERE resource_ID= $resource_ID";
        $conn->exec($mysql_query_string);
        
        //delete the image from webserver
        unlink($imagepath);
        unlink($pdfpath);
        //if the insertion success , forward to home.php
        ?>
            <script>location.assign("adminResources.php");</script>
        <?php
        }
        catch(PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
        } 
}
else{
  //$_SEESION variable isn't set and/or $_SESSION variable is empty
  ?>
    <script>location.assign("adminLogin.php");</script>
  <?php
}
?>
