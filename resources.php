<?php
session_start();
if(
        isset($_SESSION['userID'])
    &&  !empty($_SESSION['userID'])
){
      //user already logged in
    $id=$_SESSION['userID'];
    try{
        $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $loginQuery="SELECT * from userprofile WHERE userID=$id";
        $returnobj=$conn->query($loginQuery);
        $temp_profile = $returnobj->fetch();   //Fetching a single row then signle column, single value

    }
    catch(PDOException $e){
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
    <!-- HTML CODE for editProfile -->
    <!-- HomePage HTML code -->


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
        <link rel="stylesheet" href="css/resources.css">
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

        <title>Preparation & Resources</title>
    </head>

    <body>

        <!--navigation section-->
        <section id="#navbar">
                <nav class="navbar navbar-expand-lg" data-aos="fade-right;" data-aos-delay="1500">
                    <div class="container-fluid navigation">
                        <a class="navbar-brand" href="#"><img class="logo" src="images/munna_logo_white_2.png" alt="">Dream Abroad</a>
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
                                    <li><a class="dropdown-item" href="profile.php"><img src="images/students/sofi.jpg" alt="" style="height: 20px; border-radius: 50%;"> <i><?php echo $temp_profile['firstName'] ?></i></a></li>
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
            </section><br>

        
        
        <!--category list-->
        <section id="category">
            <h2>SELECT CATEGORY</h2>
            <div class="container category">
                <!-- Button trigger modal -->
                <button type="button" class="btn catBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop_gre">GRE</button><br><br>
                <button type="button" class="btn catBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop_toefl">TOEFL</button><br><br>
                <button type="button" class="btn catBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">IELTS</button><br><br>
                <button type="button" class="btn catBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">SAT</button><br><br>
                <button type="button" class="btn catBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">OTHER LANGUAGE TESTS</button><br><br>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop_gre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!--                           category name-->
                                <h5 class="modal-title" id="staticBackdropLabel">GRE</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/AhZgalyrzCg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div><br>
                                <h5>What is this?</h5>
                                <p>The Graduate Record Examination, or GRE, is an important step in the graduate school or business school application process. The GRE is a multiple-choice, computer-based, standardized exam that is often required for admission to graduate programs and graduate business programs (MBA) globally.</p><br>
                                <div class="row">
                                    <h5>Mark Distribution</h5>
                                    <img src="images/gallery/gre.png" alt="">
                                </div><br>
                                <div class="row">
                                    <a href="https://drive.google.com/drive/folders/1olZ7z-VbUbs21lHzLOe8jzSCcme71YLQ?usp=sharing" title="GRE resources" target="_blank"><i>GRE resources</i></a>
                                </div><br>
                                
                                <div class="row">
                                    <h5>Next Exam Date: 12May 2021</h5>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: red">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="fau.php" style="background-color: #84B082;">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="staticBackdrop_toefl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!--                           category name-->
                                <h5 class="modal-title" id="staticBackdropLabel">IELTS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <iframe width="560" height="315" src="https://www.facebook.com" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div><br>
                                <h5>What is this?</h5>
                                <p>International English Language Testing System or IELTS, is an important step in the graduate school or business school application process. The GRE is a multiple-choice, computer-based, standardized exam that is often required for admission to graduate programs and graduate business programs (MBA) globally.</p><br>
                                <div class="row">
                                    <h5>Mark Distribution</h5>
                                    <img src="images/gallery/gre.png" alt="">
                                </div><br>
                                <div class="row">
                                    <h5>Next Exam Date: 12May 2021</h5>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="resources.php" style="background-color: red">Close</button>
                                <button type="button" class="btn btn-primary" style="background-color: #84B082;">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>


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

        
        
        
        <!-- Option 1: Bootstrap Bundle with Popper -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>

    </body></html>
    <?php
}
else{
  //$_SEESION variable isn't set and/or $_SESSION variable is empty
  ?>
    <script>location.assign("login.php");</script>
  <?php
}
?>
