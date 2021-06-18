<?php
session_start();
if(
        isset($_SESSION['userID'])
    &&  !empty($_SESSION['userID'])
){
      //user already logged in
    $id=$_SESSION['userID'];
    $resource_ID = $_GET['res_id'];
    try{
        $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $loginQuery="SELECT * from userprofile WHERE userID=$id";
        $returnobj=$conn->query($loginQuery);
        $temp_profile = $returnobj->fetch();   //Fetching a single row then signle column, single value

        $returnResources = $conn -> query("SELECT * FROM resources WHERE resource_ID = $resource_ID");
        $row = $returnResources->fetch();

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
          <link rel="stylesheet" href="css/showRes.css">
          <!--    fontawesome-->
          <script src="https://kit.fontawesome.com/9b0ecd67ae.js" crossorigin="anonymous"></script>

          <!--    roboto font-->
          <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;700;900;1,300&display=swap" rel="stylesheet">
          <!--    raleway font-->
          <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600;900&display=swap" rel="stylesheet">
          <!--   icon-->

          <!--    jquery-->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <link rel="icon" href="images/icon.png" type="image/x-icon">

          <title>Show Resource</title>
      </head>
      <body>
            <!--navigation section-->
            <section id="#navbar">
                    <nav class="navbar navbar-expand-lg" data-aos="fade-right;" data-aos-delay="1500">
                        <div class="container-fluid navigation">
                            <a class="navbar-brand" href="home.php"><img class="logo" src="images/munna_logo_white_2.png" alt="">Dream Abroad</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span style="color: white; border: none !important;"><i class="fas fa-bars"></i></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                                <div class="navbar-nav  ml-auto ">
                                    <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
                                    <a class="nav-item nav-link active" href="higherStudies.php">Higher Studies<span class="sr-only">(current)</span></a>
                                    <a class="nav-item nav-link active" href="scholarship.php">Scholarships</a>
                                    <a class="nav-item nav-link active" href="research.php">Research & Professor</a>
                                    <a class="nav-item nav-link active" href="resources.php">Preparation & Resources</a>
                                    <a class="nav-item nav-link active" href="soplor.php">SOP/LOR</a>
                                </div>
                            </div>
                                <!--  Profile button-->
                            <div class="navbar-nav  ml-auto ">
                                <div class="dropdown dropstart" style="">
                                    <a class="btn btn-secondary dropdown-toggle nav-item nav-link active profileIcon" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.2em;background-color: transparent; border: rectangular;color: #84B082; "><i class="far fa-user-circle">Profile</i></a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="profile.php"><img src="<?php echo $temp_profile['profilePic'] ?>" alt="" style="height: 40px; border-radius: 50%;"> <i><?php echo $temp_profile['firstName'] ?></i></a></li>
                                        <li><a class="dropdown-item" href="editProfile.php">Edit Profile</a></li>
                                        <li><a class="dropdown-item" href="changePassword.php" style="color: skyblue">Change Password</a></li>
                                        <li><a class="dropdown-item" href="logOutProcess.php" style="color: red"><b>Log Out</b></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--    profile button end-->
                            </div>
                        </div>
                    </nav>
            </section>

            <!--hotline contactact section-->
            <section id="hotline">
                <div class="container hotline">
                    <div class="row">
                        <div class="col-md-6">
                            <p> <i class="fas fa-phone-alt"></i> Hotline: +880 1111 111 111</p>
                        </div>
                        <div class="col-md-6">
                            <p> <i class="fas fa-envelope"></i> Email: contact@dreamabroad.com</p>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Show Resources -->
            <section>
                <div class="" id="staticBackdrop_resource" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">   
                    <div class="container">
                        <div class="resHeader">
                            <h1><?php echo $row['resourceCategory']?></h1>
                        </div>
                        <div class="resBody">
                            <div class="row">
                                <iframe width="1080" height="720" src="<?php echo $row['introVedioLink']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div><br>
                            <h2>About: </h2>
                            <p><?php echo $row['about']?></p><br>
                            <div class="row">
                                <h2>Mark Distribution Policy: </h2><br><br><br>
                                <img src=<?php echo $row['imagePath']?> alt="">
                            </div><br>
                            <div class="col">
                                <h2>Download PDF Here: </h2> <a href=<?php echo $row['pdfPath']?> title="PDF Download" target="_blank" class="btn btn-success"><h4><i class="fas fa-download"></i> Download Resource PDF</h4></a>
                            </div><br>
                            <div class="row">
                                <a href=<?php echo $row['gDriveLink']?> title="Google Drive Link" target="_blank" class="btn btn-primary"><h4>Find Resources</h4></a>
                            </div><br>
                            <div class="row">    
                                <a href=<?php echo $row['moreLink']?> title="More Resources" target="_blank" class="btn btn-primary"><h4>Need More Resources?</h4></a>
                            </div><br>
                            <div class="row">
                                <a href=<?php echo $row['officialLink']?> title="Official Website" target="_blank" class="btn btn-primary offWeb"><h4>Visit Official Website Here</h4></a>
                            </div><br>
                            <div class="row">
                                <h2><b>Next Exam Date:</b> <span style="color:red"><?php echo $row['nextExamDate']?></span></h2>
                            </div>
                            <div class="row">
                                <h5><b>Last Modify:</b> <span style="color:blue"><?php echo $row['uploadDate']?></span></h5>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-primary" value="Apply" onclick="goApply()" style="background-color: #84B082; height: 50px; width: 100px;"></button>
                            <input type="button" class="btn btn-secondery" value="Back" onclick="goBack()" style="background-color: gray; color: white; height: 50px; width: 100px;"></button>
                        </div>
                    </div>
                </div>
            </section>    
            
            <script>
                function goApply(){
                    location.assign("apply.php");
                } 
                function goBack(){
                    location.assign("resources.php");
                } 
            </script>

            <!--footer section-->
            <section id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 importantLinks">
                            <!--                  important links-->
                            <h2>Important Links</h2>
                            <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
                                <a class="nav-item nav-link active" href="higherStudies.php">Higher Studies<span class="sr-only">(current)</span></a>
                                <a class="nav-item nav-link active" href="scholarship.php">Scholarships</a>
                                <a class="nav-item nav-link active" href="research.php">Research & Professor</a>
                                <a class="nav-item nav-link active" href="resources.php">Preparation & Resources</a>
                                <a class="nav-item nav-link active" href="soplor.php">SOP/LOR</a>
                        </div>
                        <div class="col-lg-4 contact">
                            <!--                   contact-->
                            <h2>Contact Us</h2>
                            <p> <i class="fas fa-phone-alt"></i> Hotline: +880 1111 111 111</p>
                            <p> <i class="fas fa-envelope"></i> Email: contact@dreamabroad.com</p>
                            <p> <i class="fas fa-map-marker-alt"></i> Address: Vatara, Dhaka 1212, Bangladesh</p>
                        </div>
                        <div class="col-lg-4 social">
                            <!--                   social media icons-->
                            <h2>Social Media</h2>
                            <a href="www.facebook.com" style="color: royalblue"><i class="fab fa-facebook-square"></i></a>
                            <a href="www.twitter.com" style="color: skyblue"><i class="fab fa-twitter-square"></i></a>
                            <a href="www.linkedin.com" style="color: royalblue;"><i class="fab fa-linkedin"></i></a>
                            <a href="www.youtube.com" style="color: orangered"><i class="fab fa-youtube-square"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            <!--    copyright-->
            <section id="copyright" style="background-color:#84B082;">
                <div class="container-fluid">
                    <div class="text-center p-3">
                        © 2021 Copyright:
                        <a class="text-white" href="https://dreamsabroad.com/">DREAMS ABROAD</a>
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
    <script>location.assign("login.php");</script>
  <?php
}
?>

