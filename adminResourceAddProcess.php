<?php
session_start();
if(
        isset($_SESSION['admin_ID'])
    &&  !empty($_SESSION['admin_ID'])
){
        //user already logged in
        $categoryName = $_POST['categoryName'];
        $about = $_POST['about'];
        $nextExamDate = $_POST['nextExamDate'];
        $introVedioLink = $_POST['introVedioLink'];
        $officialLink = $_POST['officialWebsiteLink'];
        $gDriveLink = $_POST['gDriveLink'];
        $moreLink = $_POST['moreLink'];
        
        $pdf = $_FILES['pdf'];
        $image = $_FILES['image'];

        $image_name=$image['name'];
        $image_tmp_path=$image['tmp_name'];
        $toImage="resourceFiles/$image_name";

        $pdf_name=$pdf['name'];
        $pdf_tmp_path=$pdf['tmp_name'];
        $toPdf="resourceFiles/$pdf_name";
        
        try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //mySQL query string create
            $mysql_query_string="INSERT INTO resources 
                                (resourceCategory, about,uploadDate,nextExamDate, introVedioLink, officialLink, gDriveLink, pdfPath, moreLink, imagePath)
                                VALUES
                                ('$categoryName','$about',now(),'$nextExamDate',
                                '$introVedioLink', '$officialLink', '$gDriveLink', 
                                '$toPdf', '$moreLink', '$toImage')";

            $conn->exec($mysql_query_string);
            move_uploaded_file($image_tmp_path, $toImage);
            move_uploaded_file($pdf_tmp_path, $toPdf);
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

        