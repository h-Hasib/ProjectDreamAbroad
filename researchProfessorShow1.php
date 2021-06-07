<?php
session_start();
if(
        isset($_SESSION['userID'])
    &&  !empty($_SESSION['userID'])
){
      if(
                $_GET['country'] != 'NULL'
            &&  $_GET['areaOfInterest'] != 'NULL'
            &&  $_GET['searchFor'] != 'NULL'
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

            <!-- CSS Scipt for decorating Table -->
            <style>
                * {font-family: sans-serif;}
                .content-table {
                  border-collapse: collapse;
                  margin-left:auto;
                  margin-right:auto;
                  font-size: 0.9em;
                  min-width: 95%;
                  table-layout: auto;
                  border-radius: 6px 6px 0 0;
                  overflow: hidden;
                  box-shadow: 0 0 20px rgba(0, 0, 0, 0.50);
                }

                .content-table thead tr {
                  background-color: #009879;
                  color: #ffffff;
                  text-align: center;
                  font-weight: bold;
                }

                .content-table th,
                .content-table td {
                  padding: 12px 15px;
                  text-align: center;
                }

                .content-table tbody tr {
                  border-bottom: 1px solid #dddddd;
                }

                .content-table tbody tr:nth-of-type(even) {
                  background-color: #DCDCDC;
                }

                .content-table tbody tr:last-of-type {
                  border-bottom: 2px solid #009879;
                }

                .content-table tbody tr.active-row {
                  font-weight: bold;
                  color: #009879;
                }
            </style>

            <title>Research & Professor</title>
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
            <br>

            <!--Professor and Research finder-->
            <?php
            $country=$_GET['country'];
            $area=$_GET['areaOfInterest'];
            $search=$_GET['searchFor'];

            if($search == 'only professor'){
              //CODE FOR "ONLY PROFESSOR FIND"
              ?>
              <section id="uniFinder"><h2>Professor List</h2>
              <?php
                  try{
                      $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $mysqlquery="SELECT *
                                    FROM professor AS prof
                                          JOIN professor_expertisearea AS prof_exp
                                          ON prof.professor_ID = prof_exp.Professor_ProfessorID

                                          JOIN expertisearea AS exp
                                          ON exp.expAreaID = prof_exp.expertiseArea_expAreaID

                                          JOIN department AS dept
                                          ON prof.department_deptID = dept.deptID

                                          JOIN unischool AS school
                                          ON dept.uniSchool_schoolID=school.schoolID

                                          JOIN university
                                          ON school.uni_UniversityID=university.universityID

                                    WHERE prof.country='$country' AND exp.areaName='$area'";

                      $returnTableObj=$conn->query($mysqlquery);
                      $returnTable=$returnTableObj->fetchAll();

                      // Write the code of Table
                      ?>
                          <!-- Table to show just the COUNTRY and AREA OF EXPERTISE -->
                      <br><br><table class="content-table">
                          <thead>
                            <tr>
                              <th><h4>Country: <i><?php echo $country ?></i></h4></th>
                              <th><h4>Area of Expertise: <i><?php echo $area ?></i></h4></th>
                            </tr>
                          </thead>
                      </table><br>
                          <!-- create the main table containing PROFESSOR INFORMATION -->
                      <table class="content-table">
                          <thead>
                            <br><tr>
                              <th>Professor Name</th>
                              <th>Email</th>
                              <th>University</th>
                              <th>Department</th>
                              <th>University URL</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          if($returnTableObj->rowCount()==0){ //Database return nothing
                          ?>
                                    <tr>
                                      <td colspan="5"><p style="color: red "><b>Sorry! No Data Found In The Database That Match With Your Search Keys. Don't worry, We'll Update Soon.</b></p></td>
                                    </tr>
                                </tbody>
                              </table><br><br><br><br>
                          <?php
                          }
                          else{
                                //code for printing the professor list with information
                                foreach ($returnTable as $row) {
                                  ?>
                                  <tr>
                                      <td><?php echo $row['profName']?></td>
                                      <td><?php echo $row['profEmail']?></td>
                                      <td><?php echo $row['uniName']?></td>
                                      <td><?php echo $row['deptName']?></td>
                                      <td><?php echo $row['uniWebUrl']?></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                </tbody>
                            </table><br><br><br><br>
                          <?php
                        }
                  }
                  catch(PDOException $e){
                        echo 'Connection failed: ' . $e->getMessage();
                  }
                  ?>
              </section>
              <?php
            }
            else{
              //CODE FOR "RESEARCH INFO WITH PROFESSOR FIND"
              ?>
              <section id="uniFinder"><h2>Research Info with Professor List</h2>
              <?php
                  try{
                      $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $mysqlquery="SELECT DISTINCT(res.researchID), res.projectName,university.uniName,university.uniWebUrl, university.uniEmail, university.uni_Phone_Number
                                        FROM expertisearea AS exp
                                              JOIN expertisearea_researchproject AS exp_res
                                              ON exp.expAreaID = exp_res.expArea_ID
                                              JOIN researchproject AS res
                                              ON exp_res.research_ID = res.researchID
                                              JOIN professor_researchproject AS prof_res
                                              ON res.researchID = prof_res.researchProject_researchID
                                              JOIN professor AS prof
                                              ON prof_res.prof_res_professorID = prof.professor_ID
                                              JOIN university
                                              ON res.university_universityID = university.universityID
                                        WHERE exp.areaName = '$area' AND prof.country = '$country'";

                      $returnTableObj=$conn->query($mysqlquery);
                      $returnTable=$returnTableObj->fetchAll();

                      // Write the code of Table
                      ?>
                          <!-- Table to show just the COUNTRY and AREA OF EXPERTISE -->
                      <br><br><table class="content-table">
                          <thead>
                            <tr>
                              <th><h4>Country: <i><?php echo $country ?></i></h4></th>
                              <th><h4>Research Area: <i><?php echo $area ?></i></h4></th>
                            </tr>
                          </thead>
                      </table><br>
                          <!-- create the main table containing PROFESSOR INFORMATION -->
                      <table class="content-table">
                          <thead>
                            <br><tr>
                              <th>Research ID</th>
                              <th>Research Name</th>
                              <th>University Name</th>
                              <th>University URL</th>
                              <th>University Email</th>
                              <th>University Phone</th>
                              <th>More</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          if($returnTableObj->rowCount()==0){ //Database return nothing
                          ?>
                                    <tr>
                                      <td colspan="7"><p style="color: red "><b>Sorry! No Data Found In The Database That Match With Your Search Keys. Don't worry, We'll Update Soon.</b></p></td>
                                    </tr>
                                </tbody>
                              </table><br><br><br><br>
                          <?php
                          }
                          else{
                                //code for printing the professor list with information
                                foreach ($returnTable as $row) {
                                  ?>
                                  <tr>
                                      <td><?php echo $row['researchID']?></td>
                                      <td><?php echo $row['projectName']?></td>
                                      <td><?php echo $row['uniName']?></td>
                                      <td><?php echo $row['uniWebUrl']?></td>
                                      <td><?php echo $row['uniEmail']?></td>
                                      <td><?php echo $row['uni_Phone_Number']?></td>
                                      <td>
                                          <br><input type="button" value="Research Details" style="background-color: DodgerBlue; color: white; border-radius:9px" onclick="detailsfn(<?php echo $row['researchID'] ?>)"><br><br>
                                          <input type="button" value="Supervisor Details" style="background-color: MediumSeaGreen; color:white; border-radius:9px" onclick="supervisorfn(<?php echo $row['researchID'] ?>);"><br><br>
                                      </td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                </tbody>
                            </table><br><br><br><br>
                          <?php
                        }
                  }
                  catch(PDOException $e){
                        echo 'Connection failed: ' . $e->getMessage();
                  }
                  ?>
              </section>
              <?php
            }
            ?>

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

            <script>    //javascript code
              function detailsfn(pid){
                //for multiple var,values: file.php?var1=value & var2=val2
                location.assign('researchDetails.php?research_id='+pid); //for GET not POST method
              }
              function supervisorfn(pid){
                location.assign('supervisorDetails.php?research_id='+pid);
              }
          </script>

        </body></html>
      <?php
      }
      else{
        ?>
          <script>location.assign("research.php");</script>
        <?php
      }
}
else{
  //$_SEESION variable isn't set and/or $_SESSION variable is empty
  ?>
    <script>location.assign("login.php");</script>
  <?php
}
?>
