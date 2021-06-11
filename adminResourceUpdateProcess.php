<?php
session_start();
if(
        isset($_SESSION['admin_ID'])
    &&  !empty($_SESSION['admin_ID'])
){
        //user already logged in
        $resource_ID = $_POST['resource_ID'];
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
          
            $query_string="UPDATE resources 
                            SET resourceCategory= '$categoryName',
                                about = '$about',
                                uploadDate = now(),
                                nextExamDate = '$nextExamDate',
                                introVedioLink = '$introVedioLink',
                                officialLink = '$officialLink',
                                gDriveLink = '$gDriveLink',
                                moreLink = '$moreLink'
                            WHERE resource_ID=$resource_ID";

            $conn->exec($query_string);

            if($toImage == "resourceFiles/" && $toPdf == "resourceFiles/"){   
                //if no image and pdf selected
               ?> <script>location.assign("adminResources.php");</script> <?php
            }
            else if($toImage != "resourceFiles/" && $toPdf == "resourceFiles/"){
                //Just image selectedd
                $sqlQuery = $conn->query("SELECT imagePath FROM resources WHERE resource_ID=$resource_ID");
                $temp = $sqlQuery->fetch();

                $imagePath = $temp['imagePath']; //delete an image from localserver when it update from the website
                if($toImage != $imagePath){     //if new image and previously uploaded image doesn't match
                    $conn->exec("UPDATE resources 
                                    SET imagePath = '$toImage'  
                                    WHERE resource_ID=$resource_ID");
                    move_uploaded_file($image_tmp_path,$toImage); 
                    unlink($imagePath);//delete the previous uploaded imagefile from the server
                }    
                ?>
                    <script>location.assign("adminResources.php");</script>
                <?php
            }
            else if($toImage == "resourceFiles/" && $toPdf != "resourceFiles/"){
                //Just PDF selectedd
                //Just image selectedd
                $sqlQuery = $conn->query("SELECT pdfPath FROM resources WHERE resource_ID=$resource_ID");
                $temp = $sqlQuery->fetch();

                $pdfPath = $temp['pdfPath']; //delete an image from localserver when it update from the website
                if($toPdf != $pdfPath){     //if new image and previously uploaded image doesn't match
                    $conn->exec("UPDATE resources 
                                    SET pdfPath = '$toPdf' 
                                    WHERE resource_ID=$resource_ID");
                    move_uploaded_file($pdf_tmp_path, $toPdf);
                    unlink($pdfPath);//delete the previous uploaded pdf File from the server
                }    
                ?>
                    <script>location.assign("adminResources.php");</script>
                <?php
            }
            else{
                //Both image and pdf selected
                //Image and PDF selected for the first time or further upload to update profile picture
                //query to store previous imagepath from database
                $sqlQuery = $conn->query("SELECT pdfPath, imagePath FROM resources WHERE resource_ID=$resource_ID");
                $temp = $sqlQuery->fetch();
                $pdfPath = $temp['pdfpath'];  //delete an image from localserver when it deleted from the website
                $imagePath = $temp['imagePath'];
                if(($toImage != $imagePath)&&($toPdf != $pdfPath)){     //if new image and previously uploaded image doesn't match
                        $conn->exec("UPDATE resources 
                                        SET imagePath = '$toImage', pdfPath='$toPdf'  
                                        WHERE resource_ID=$resource_ID");
                        move_uploaded_file($pdf_tmp_path, $toPdf);
                        move_uploaded_file($image_tmp_path,$toImage);
                        unlink($pdfPath); //delete the previous uploaded imagefile from the server
                        unlink($imagePath);
                }    
                ?>
                    <script>location.assign("adminResources.php");</script>
                <?php
            }
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

        