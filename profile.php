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

            $loginQuery="SELECT * from address WHERE userProfile_userID=$id";
            $returnobj=$conn->query($loginQuery);
            $temp_address = $returnobj->fetch();

            $loginQuery="SELECT * from education WHERE userProfile_userID=$id";
            $returnobj=$conn->query($loginQuery);
            $temp_education = $returnobj->fetch();

      }
      catch(PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
      }
      $first= $temp_profile['firstName'];
      $last= $temp_profile['lastName'];
      ?>
      <!-- HTML CODE for editProfile -->
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
            <link rel="stylesheet" href="css/profile.css">
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

            <title>Your Profile</title>
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

            <!--profile section-->
            <section id="profile">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="profileImage">
                                <img src="<?php echo $temp_profile['profilePic']?>" alt="">
                                <div class="topText" >
                                    <h1><?php print_r($temp_profile['firstName']);echo"  "; print_r($temp_profile['lastName']); ?></h1>
                                    <h3><i><?php print_r($temp_profile['occupation']);?></i> <?php echo"  at  ";?> <i><?php print_r($temp_profile['job_institute']); ?></i></h3><br>
                                    <h3><i class="fas fa-map-marker-alt"></i><i><?php print_r($temp_address['district']);echo", "; print_r($temp_address['country']); ?></i> </h3>
                                </div>
                            </div><br><br><br><br>
                            <h2>Education:</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"><b>DEGREE</b></th>
                                        <th scope="co2"><b>PROGRAM/GROUP</b></th>
                                        <th scope="co3"><b>YEAR</b></th>
                                        <th scope="co4"><b>INSTITUTION</b></th>
                                        <th scope="co5"><b>GPA/CGPA</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php print_r($temp_education['exam_ssc']);?></th>
                                        <td><?php print_r($temp_education['group_ssc']);?></td>
                                        <td><?php print_r($temp_education['year_ssc']);?></td>
                                        <td><?php print_r($temp_education['institute_ssc']);?></td>
                                        <td><?php print_r($temp_education['gpa_ssc']);?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php print_r($temp_education['exam_hsc']);?></th>
                                        <td><?php print_r($temp_education['group_hsc']);?></td>
                                        <td><?php print_r($temp_education['year_hsc']);?></td>
                                        <td><?php print_r($temp_education['institute_hsc']);?></td>
                                        <td><?php print_r($temp_education['gpa_hsc']);?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php print_r($temp_education['undergrad']);?></th>
                                        <td><?php print_r($temp_education['ug_program']);?></td>
                                        <td><?php print_r($temp_education['ug_year']);?></td>
                                        <td><?php print_r($temp_education['ug_institute']);?></td>
                                        <td><?php print_r($temp_education['ug_cgpa']);?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?php print_r($temp_education['graduate']);?></th>
                                        <td><?php print_r($temp_education['g_program']);?></td>
                                        <td><?php print_r($temp_education['g_year']);?></td>
                                        <td><?php print_r($temp_education['g_institute']);?></td>
                                        <td><?php print_r($temp_education['g_cgpa']);?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>

                            <!-- Write Code for Service  Track-->
                            <!-- Code written in 'extra' -->

                            <div class="profileContact">
                                <h2>Contact Information</h2>
                                <p><i class="fas fa-phone-alt"></i> Phone :  <?php print_r($temp_profile['phoneNumber']);?></p>
                                <p> <i class="fas fa-envelope"></i> Email :  <?php print_r($temp_profile['email']);?></p>
                                <p> <i class="fas fa-map-marker-alt"></i> Address: <br>
                                    Street: <i><?php print_r($temp_address['street']); echo", ";?></i> City: <i><?php print_r($temp_address['city']); ?></i><br>
                                    District: <i><?php print_r($temp_address['district']);echo", ";?></i> State: <i><?php print_r($temp_address['state']); ?></i><br>
                                    Zip/Postal Code:<i><?php print_r($temp_address['zipCode']); echo", ";?></i> Country: <i><?php print_r($temp_address['country']); ?></i><br>
                                </p>

                            </div><br>
                        </div><br>
                        <!-- will be added the notification/work progress here -->
                        <!-- Code written in 'extra' -->
                    </div>
                </div><br><br>
                <div class="d-grid gap-2" style="margin-top: -6%;">
                    <a class="btn " href="editProfile.php" role="button" style="background-color: dodgerblue; color: white; font-size: 1.2em;">Edit Your Profile</a>
                </div>
            </section><br><br>

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


            <!--Start of Tawk.to Script-->
                <!-- Code Written in 'extra' -->
            <!--End of Tawk.to Script-->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
            <!-- MDB -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>

        </body></html>

        <!-- END of HTML CODE -->
        <?php
}
else{
      //$_SEESION variable isn't set and/or $_SESSION variable is empty
      ?>
      <script>location.assign("login.php");</script>
      <?php
}
?>
