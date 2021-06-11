<?php 
session_start();
if(
        isset($_SESSION['admin_ID'])
    &&  !empty($_SESSION['admin_ID'])
){
    //user already logged in
    $id=$_SESSION['admin_ID'];
    $resource_ID = $_GET['res_id'];
    try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $loginQuery="SELECT * from adminprofile WHERE admin_ID=$id";
            $returnobj=$conn->query($loginQuery);
            $temp_profile = $returnobj->fetch();   //Fetching a single row then signle column, single value
            //$fName = $temp['firstName'];
            $resQuery="SELECT * from resources WHERE resource_ID=$resource_ID";
            $returnobj=$conn->query($resQuery);
            $temp = $returnobj->fetch();

    }
    catch(PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
    <!doctype html>
    <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

            <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />

            <!--    custom css-->
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/higherStudy.css">
            <!--    fontawesome-->
            <script src="https://kit.fontawesome.com/9b0ecd67ae.js" crossorigin="anonymous"></script>
            <!--    roboto font-->
            <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;700;900;1,300&display=swap" rel="stylesheet">
            <!--    raleway font-->
            <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600;900&display=swap" rel="stylesheet">
            <!--    jquery-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link rel="icon" href="images/icon.png" type="image/x-icon">
            <title>Admin Update Resources</title>
        </head>
        <body>   
            <!--navigation section-->
            <section id="#navbar">
                <nav class="navbar navbar-expand-lg" data-aos="fade-right;" data-aos-delay="1500">
                    <div class="container-fluid navigation">
                        <a class="navbar-brand" href="adminHome.php"><img class="logo" src="images/munna_logo_white_2.png" alt="">Dream Abroad</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span style="color: white; border: none !important;"><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <div class="navbar-nav  ml-auto ">
                                <a class="nav-item nav-link active" href="adminHome.php">Home <span class="sr-only">(current)</span></a>  
                                <a class="nav-item nav-link active" href="adminUserMonitoring.php">User Monitoring <span class="sr-only">(current)</span></a>
                                <a class="nav-item nav-link active" href="adminHigherStudies.php">Higher Studies section<span class="sr-only">(current)</span></a>
                                <a class="nav-item nav-link active" href="adminScholarship.php">Scholarships section</a>
                                <a class="nav-item nav-link active" href="adminResearch.php">Research & Professor section</a>
                                <a class="nav-item nav-link active" href="adminResources.php">Preparation & Resources section</a>
                                <a class="nav-item nav-link active" href="adminSoplor.php">SOP/LOR section</a>
                            </div>
                        </div>

                                <!--  Profile button-->
                      <div class="navbar-nav  ml-auto ">
                          <div class="dropdown dropstart" style="">
                              <a class="btn btn-secondary dropdown-toggle nav-item nav-link active profileIcon" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.2em;background-color: transparent; border: rectangular;color: #84B082; "><i class="far fa-user-circle">Profile</i></a>
                              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#"><img src="images/admin/admin1.jpg" alt="" style="height: 20px; border-radius: 50%;"> <i><?php echo $temp_profile['admin_name'] ?></i></a></li>
                                <li><a class="dropdown-item" href="adminChangePassword.php" style="color: skyblue">Change Password</a></li>
                                <li><a class="dropdown-item" href="adminLogOutProcess.php" style="color: red"><b>Log Out</b></a></li>
                              </ul>
                          </div>
                      </div>
                      <!--    profile button end-->
                        </div>
                    </div>
                </nav>
            </section>
            <!-- Code for add Field -->
            <section id="editProfile">
            <h1 class="title" style="text-align: center; background-color: #211A1E; color: #84B082;"> Update Resources and Information </h1><br>
            <div class="container">
                <form action="adminResourceUpdateProcess.php" method='POST' enctype="multipart/form-data">
                    <!-- Passing research_ID to adminResourceUpdateProcess -->
                    <input id="resource_ID" name="resource_ID" type="hidden" value="<?php echo $resource_ID ?>"></input>
                    <!-- categoryName -->
                    <div class="row form-group form-floating">
                        <input type="text" class="form-control" placeholder="Category Name"  id="categoryName" name="categoryName" value="<?php echo $temp['resourceCategory']?>">
                        <label for="categoryName"> &nbsp; Category Name</label>
                    </div><br>
                    <!-- about -->
                    <div class="row form-group form-floating">
                        <textarea class="form-control" placeholder="<?php echo $temp['about']?>" id="about" name="about" value="<?php echo $temp['about']?>" style="height:200px; width=100%; font-size:14pt;"><?php echo $temp['about']?></textarea>
                        <label for="about"> &nbsp; Description</label>
                    </div><br>
                    <!-- nextExamDate-->
                    <div class="row">
                        <div class="col-lg-6 form-group form-floating">
                            <input type="date" class="form-control" placeholder="Next Exam Date" aria-label="Next Exam Date" id="nextExamDate" name="nextExamDate" value="<?php echo $temp['nextExamDate']?>">
                            <label for="nextExamDate"> &nbsp; Next Exam Date </label>
                        </div>
                    </div><br>
                    <!-- introVedioLink -->
                    <div class="row form-group form-floating">
                        <input type="text" class="form-control" placeholder="Intro Vedio Link"  id="introVedioLink" name="introVedioLink" value="<?php echo $temp['introVedioLink']?>">
                        <label for="introVedioLink"> &nbsp; Intro Vedio Link</label>
                    </div><br>
                    <!-- officialWebsiteLink -->
                    <div class="row form-group form-floating">
                        <input type="text" class="form-control" placeholder="Official Website Link"  id="officialWebsiteLink" name="officialWebsiteLink" value="<?php echo $temp['officialLink']?>">
                        <label for="officialWebsiteLink"> &nbsp; Official Website Link</label>
                    </div><br>
                    <!-- gDriveLink -->
                    <div class="row form-group form-floating">
                        <input type="text" class="form-control" placeholder="Google Drive Link"  id="gDriveLink" name="gDriveLink" value="<?php echo $temp['gDriveLink']?>">
                        <label for="gDriveLink"> &nbsp; Google Drive Link</label>
                    </div><br>
                    
                    <!-- moreLink -->
                    <div class="row form-group form-floating">
                        <input type="text" class="form-control" placeholder="More Resource Link"  id="moreLink" name="moreLink" value="<?php echo $temp['moreLink']?>">
                        <label for="moreLink"> &nbsp; More Resource Link</label>
                    </div><br>

                    <!-- pdf -->
                    <div>
                        <label for="pdf">Upload PDF File:</label>
                        <input type="file" id="pdf" name="pdf" style="border: none;" value="<?php echo $temp['pdfPath']?>">
                    </div><br>

                    <!-- image -->
                    <div>
                        <label for="image">Upload Image File:</label>
                        <input type="file" id="image" name="image" style="border: none;" value="<?php echo $temp['imagePath']?>">
                    </div><br><br>
                    <input type="submit" value="Update Resource" class="btn btn-lg" style="background-color: royalblue; color: white"></input>
                </form><br>
            </div>
            </section><br>
            <!-- Ending  -->

            <!--    copyright-->
            <section id="copyright" style="background-color:#84B082;">
                <div class="container-fluid">
                    <div class="text-center p-3">
                        © 2021 Copyright:
                        <a class="text-white" href="https://dreamsabroad.com/" target="_blank">DREAMS ABROAD</a>
                    </div>
                </div>
            </section>

            <!-- Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
            <!-- MDB -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
        </body></html>
      <!-- END OF HOMEPAGE HTML CODE -->
    <?php

}
else{
  //$_SEESION variable isn't set and/or $_SESSION variable is empty
    ?>
        <script>location.assign("adminLogin.php");</script>
    <?php
}
?>
