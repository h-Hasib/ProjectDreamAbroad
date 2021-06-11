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
          //$fName = $temp['firstName'];
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
        <!--    fontawesome-->
        <script src="https://kit.fontawesome.com/9b0ecd67ae.js" crossorigin="anonymous"></script>

        <!--    roboto font-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;700;900;1,300&display=swap" rel="stylesheet">
        <!--    raleway font-->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600;900&display=swap" rel="stylesheet">
        <!--    jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="icon" href="images/icon.png" type="image/x-icon">

        <title>Edit Profile</title>
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
                                <li><a class="dropdown-item" href="profile.php"><img src="<?php echo $temp_profile['profilePic'] ?>" alt="" style="height: 40px; border-radius: 60%;"> <i><?php echo $temp_profile['firstName']?></i></a></li>
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
        <!--    edit profile section-->
        <section id="editProfile">
          <h1 class="title" style="text-align: center; background-color: #211A1E; color: #84B082;"> Edit Your Profile </h1><br>
          <div class="container">
              <form action="editProfileProcess.php" method='POST' enctype="multipart/form-data">
                <!-- For First name , Last name -->
                <div class="row">
                    <div class="col form-group form-floating">
                        <input type="text" class="form-control" placeholder="First Name" aria-label="First name" id="firstName" name="firstName" value="<?php echo $temp_profile['firstName']?>">
                        <label for="firstName"> &nbsp; First Name</label>
                    </div>
                    <div class="col form-group form-floating">
                        <input type="text" class="form-control" placeholder="Last Name" aria-label="Last name" id="lastName" name="lastName" Value="<?php echo $temp_profile['lastName']?>">
                        <label for="lastName"> &nbsp; Last Name</label>
                    </div>
                </div><br>
                <!-- for fatherName, motherName -->
                <div class="row">
                    <div class="col form-group form-floating">
                        <input type="text" class="form-control" placeholder=" Father's name" aria-label="Father's name" id="fatherName" name="fatherName" value="<?php echo $temp_profile['fatherName']?>">
                        <label for="fatherName"> &nbsp; Father's Name</label>
                    </div>
                    <div class="col form-group form-floating">
                        <input type="text" class="form-control" placeholder=" Mother's name" aria-label="Mothers's name" id="motherName" name="motherName" value="<?php echo $temp_profile['motherName']?>">
                        <label for="motherName"> &nbsp; Mother's Name</label>
                    </div>
                </div><br>
                <!-- for religion,nationality  -->
                <div class="row">
                    <div class="col-lg-6 form-group form-floating">
                          <input type="text" class="form-control" placeholder="Religion" aria-label="Religion" id="religion" name="religion" value="<?php echo $temp_profile['religion']?>">
                          <label for="religion"> &nbsp; Religion </label>
                    </div>
                    <div class="col-lg-6 form-group form-floating">
                          <input type="text" class="form-control" placeholder="Nationality" aria-label="Nationality" id="nationality" name="nationality" value="<?php echo $temp_profile['nationality']?>">
                          <label for="nationality"> &nbsp; Nationality</label>
                    </div><br>
                </div><br>
                <!-- for occupation,jobInstitute -->
                <div class="row">
                    <div class="col-lg-6 form-group form-floating">
                          <input type="text" class="form-control" placeholder="occupation" aria-label="occupation" id="occupation" name="occupation" value="<?php echo $temp_profile['occupation']?>">
                          <label for="occupation"> &nbsp; Occupation </label>
                    </div>
                    <div class="col-lg-6 form-group form-floating">
                          <input type="text" class="form-control" placeholder="job Institute" aria-label="jobInstitute" id="jobInstitute" name="jobInstitute" value="<?php echo $temp_profile['job_institute']?>">
                          <label for="jobInstitute"> &nbsp; Job Institute</label>
                    </div><br>
                </div><br>
                    <!-- Adress bar -->
                <!-- for inputStreet,inputCity -->
                <br><div class="row">
                      <label for="inputAddress"><b><i>Address:</i></b></label>
                      <div class="col-lg-6 form-group form-floating">
                          <input type="text" class="form-control" placeholder="Street" aria-label="Street" id="inputStreet" name="inputStreet" value="<?php echo $temp_address['street']?>">
                          <label for="inputStreet"> &nbsp; Street </label>
                      </div>
                      <div class="col-lg-6 form-group form-floating">
                          <input type="text" class="form-control" placeholder="City/Town/Village" aria-label="City/Town/Village" id="inputCity" name="inputCity" value="<?php echo $temp_address['city']?>">
                          <label for="inputCity"> &nbsp; City/Town/Village</label>
                      </div>
                </div><br>
                <!-- for inputDistrict,inputState -->
                <div class="row">
                    <div class="col-lg-6 form-group form-floating">
                        <input type="text" class="form-control" placeholder="District/City Areal" aria-label="District/City Areal" id="inputDistrict" name="inputDistrict" value="<?php echo $temp_address['district']?>">
                        <label for="inputDistrict"> &nbsp; District/City Areal </label>
                    </div>
                    <div class="col-lg-6 form-group form-floating">
                        <input type="text" class="form-control" placeholder="State(optional)" aria-label="State(optional)" id="inputState" name="inputState" value="<?php echo $temp_address['state']?>">
                        <label for="inputState"> &nbsp; State(optional)</label>
                    </div>
                </div><br>
                <!-- for inputZip, inputCountry -->
                <div class="row">
                    <div class="col-lg-6 form-group form-floating">
                        <input type="text" class="form-control" placeholder="Zip/Postal Code" aria-label="Zip/Postal Code" id="inputZip" name="inputZip" value="<?php echo $temp_address['zipCode']?>">
                        <label for="inputZip"> &nbsp; Zip/Postal Code </label>
                    </div>
                    <div class="col-lg-6 form-group form-floating">
                        <input type="text" class="form-control" placeholder="Country" aria-label="Country" id="inputCountry" name="inputCountry" value="<?php echo $temp_address['country']?>">
                        <label for="inputCountry"> &nbsp; Country</label>
                    </div>
                </div><br>
                <!-- for inputdob, inputNID -->
                <div class="row">
                    <div class="col-lg-6 form-group form-floating">
                        <input type="date" class="form-control" placeholder="Date Of Birth" aria-label="Date Of Birth" id="inputdob" name="inputdob" value="<?php echo $temp_profile['dob']?>">
                        <label for="inputdob"> &nbsp; Date Of Birth </label>
                    </div>
                    <div class="col-lg-6 form-group form-floating">
                        <input type="text" class="form-control" placeholder="NID" aria-label="nid" id="inputNID" name="inputNID" value="<?php echo $temp_profile['nidPassport']?>">
                        <label for="inputNID"> &nbsp; NID/PASSPORT/BIRTH CIRTIFICATE</label>
                    </div>
                </div><br>

                <!--                education  section-->
                <div class="edu" style="border: 2px solid #84B082; padding: 1%;">
                    <h2 style="border-bottom: 2px solid #211A1E;">Education</h2><br>

                    <!--      SSC/O-LEVEL          -->
                    <!-- for examDegree1,group1,gpa1, year1,institution1,board1 -->
                    <div class="row">
                        <h4>SSC/O-Level/Equivalent*</h4>
                        <div class="col form-group form-floating" style="padding: 2%;">
                            <select name="examDegree1" id="examDegree1" style="border: none; border-bottom: 2px solid #211A1E; width: 100%">
                                <option value="<?php echo $temp_education['exam_ssc']?>">--Select Degree--</option>
                                <option value="ssc">SSC</option>
                                <option value="olevel">O-Level</option>
                                <option value="dakhil">Dakhil</option>
                            </select>
                        </div><br>
                        <div class="col form-group form-floating" style="padding: 2%;">
                            <select name="group1" id="group1" style="border: none; border-bottom: 2px solid #211A1E; width: 100%">
                                <option value="<?php echo $temp_education['group_ssc']?>">--Select Group--</option>
                                <option value="science">Science</option>
                                <option value="business">Business</option>
                                <option value="humanities">Humanities</option>
                                <option value="other">Others</option>
                            </select>
                        </div><br>
                        <div class="row">
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="GPA" aria-label="GPA" id="gpa1" name="gpa1" value="<?php echo $temp_education['gpa_ssc']?>">
                                <label for="gpa1"> &nbsp; GPA </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="YEAR" aria-label="YEAR" id="year1" name="year1" value="<?php echo $temp_education['year_ssc']?>">
                                <label for="year1"> &nbsp; YEAR </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="institution" aria-label="institution" id="institution1" name="institution1" value="<?php echo $temp_education['institute_ssc']?>">
                                <label for="institution1"> &nbsp; Institution </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="board" aria-label="board" id="board1" name="board1" value="<?php echo $temp_education['board_ssc']?>">
                                <label for="board1"> &nbsp; Board </label>
                            </div>
                        </div>
                    </div><br>
                    <!--                HSC-->
                    <!-- examDegree2,group2,gpa2,year2,institution2,board2-->
                    <div class="row">
                        <h4>HSC/A-Level/Equivalent*</h4>
                        <div class="col form-group form-floating" style="padding: 2%;">
                            <select name="examDegree2" id="examDegree2" style="border: none; border-bottom: 2px solid #211A1E; width: 100%">
                                <option value="<?php echo $temp_education['exam_hsc']?>">--Select Degree--</option>
                                <option value="hsc">HSC</option>
                                <option value="alevel">A-Level</option>
                                <option value="alim">Alim</option>
                                <option value="diploma">Diploma</option>
                                <option value="other">Other</option>
                            </select>
                        </div><br>
                        <div class="col form-group form-floating" style="padding: 2%;">
                            <select name="group2" id="group2" style="border: none; border-bottom: 2px solid #211A1E; width: 100%">
                                <option value="<?php echo $temp_education['group_hsc']?>">--Select Group--</option>
                                <option value="science">Science</option>
                                <option value="business">Business</option>
                                <option value="humanities">Humanities</option>
                                <option value="other">Others</option>
                            </select>
                        </div><br>
                        <div class="row">
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="GPA" aria-label="GPA" id="gpa2" name="gpa2" value="<?php echo $temp_education['gpa_hsc']?>">
                                <label for="gpa2"> &nbsp; GPA </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="year" aria-label="year" id="year2" name="year2" value="<?php echo $temp_education['year_hsc']?>">
                                <label for="floatingInput"> &nbsp; YEAR </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="institution" aria-label="institution" id="institution2" name="institution2" value="<?php echo $temp_education['institute_hsc']?>">
                                <label for="institution2"> &nbsp; Institution </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="board" aria-label="board" id="board2" name="board2" value="<?php echo $temp_education['board_hsc']?>">
                                <label for="board2"> &nbsp; Board </label>
                            </div>
                        </div>
                    </div><br>
                    <!--                BACHELOR-->
                    <!-- examDegree3,group3,gpa3,year3,institution3-->
                    <div class="row">
                        <h4>Under Graduate</h4>
                        <div class="row">
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="exam degree" aria-label="Degree" id="examDegree3" name="examDegree3" value="<?php echo $temp_education['undergrad']?>">
                                <label for="examDegree3"> &nbsp;Degree Name </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="program" aria-label="program" id="group3" name="group3" value="<?php echo $temp_education['ug_program']?>">
                                <label for="group3"> &nbsp;Program Name </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="GPA" aria-label="GPA" id="gpa3" name="gpa3" value="<?php echo $temp_education['ug_cgpa']?>">
                                <label for="gpa3"> &nbsp; CGPA </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="year" aria-label="year" id="year3" name="year3" value="<?php echo $temp_education['ug_year']?>">
                                <label for="year3"> &nbsp; YEAR </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="institution" aria-label="institution" id="institution3" name="institution3" value="<?php echo $temp_education['ug_institute']?>">
                                <label for="institution3"> &nbsp; Institution </label>
                            </div>
                        </div>
                    </div><br>
                    <!--                Masters-->
                    <!-- examDegree4,group4,gpa4,year4,institution4-->
                    <div class="row">
                        <h4>Graduation</h4>

                        <div class="row">
                          <div class="col form-group form-floating">
                              <input type="text" class="form-control" placeholder="exam degree" aria-label="Degree" id="examDegree4" name="examDegree4" value="<?php echo $temp_education['graduate']?>">
                              <label for="examDegree4"> &nbsp;Degree Name </label>
                          </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="program" aria-label="program" id="group4" name="group4" value="<?php echo $temp_education['g_program']?>">
                                <label for="group4"> &nbsp;Program Name </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="GPA" aria-label="GPA" id="gpa4" name="gpa4" value="<?php echo $temp_education['g_cgpa']?>">
                                <label for="gpa4"> &nbsp; CGPA </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="year" aria-label="year" id="year4" name="year4" value="<?php echo $temp_education['g_year']?>">
                                <label for="year4"> &nbsp; YEAR </label>
                            </div>
                            <div class="col form-group form-floating">
                                <input type="text" class="form-control" placeholder="institution" aria-label="institution" id="institution4" name="institution4" value="<?php echo $temp_education['g_institute']?>">
                                <label for="institution4"> &nbsp; Institution </label>
                            </div>
                        </div>
                    </div><br>
                </div><br>
                <!-- phoneNumber -->
                <div class="form-group form-floating">
                    <input type="phone" class="form-control bright" placeholder=" Change Phone Number" aria-describedby="phoneHelp" id="phoneNumber" name="phoneNumber" value="<?php echo $temp_profile['phoneNumber']?>">
                    <label for="phoneNumber"> &nbsp; Change Phone Number </label>
                </div><br>

                <!-- oldPass -->
                <div class="row">
                    <div class="col-md-6 form-group">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="Password" required>
                            <label for="oldPass" style="color: red">Password</label>
                        </div>
                    </div>
                </div><br>

                <!-- change pic -->
                <div>
                    <label for="changeImg">Upload Your Profile Picture:</label>
                    <input type="file" id="changeImg" name="changeImg" style="border: none;">
                </div><br><br>
                <!-- value=" echo $temp_profile['profilePic']" -->
                <div class="form-check" style="padding-top: 2%;">
                    <input class="form-check-input" type="checkbox" value="" id="aggree" name="aggree" style="border: 1px solid black;" required>
                    <label class="form-check-label" for="aggree">
                        I agree the terms and conditions of Dreamers Abroad
                    </label>
                </div><br><br>
                <input type="submit" value="UPDATE PROFILE" class="btn btn-lg" style="background-color: royalblue; color: white"></input>

              </form><br>
          </div>
        </section><br>

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
