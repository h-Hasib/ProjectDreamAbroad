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

          <title>Home</title>
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

          <!--   carousels-->
          <section id="carousel">
              <div class="container">
                  <div class="row">
                      <div class="">
                          <!--               Leading Universites-->
                          <div class="uni">
                              <h2>Leading Universites</h2>
                              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                  <div class="carousel-indicators">
                                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                  </div>
                                  <div class="carousel-inner">
                                      <div class="carousel-item active">
                                          <img src="images/universities/californiaUni.png" class="d-block w-100" alt="...">
                                          <div class="carousel-caption d-none d-md-block">
                                              <h5>University of california</h5>
                                              <p>The University of California is a public land-grant research university system in the U.S. state of California</p>
                                          </div>
                                      </div>
                                      <div class="carousel-item">
                                          <img src="images/universities/cambridge.jpg" class="d-block w-100" alt="...">
                                          <div class="carousel-caption d-none d-md-block">
                                              <h5>University Of Cambridge</h5>
                                              <p>The University of Cambridge is a collegiate research university in Cambridge, United Kingdom</p>
                                          </div>
                                      </div>
                                      <div class="carousel-item">
                                          <img src="images/universities/melbourne.jpg" class="d-block w-100" alt="...">
                                          <div class="carousel-caption d-none d-md-block">
                                              <h5>University of Melbourne</h5>
                                              <p>The University of Melbourne is a public research university located in Melbourne, Australia. </p>
                                          </div>
                                      </div>
                                      <div class="carousel-item">
                                          <img src="images/universities/torontoUni.png" class="d-block w-100" alt="...">
                                          <div class="carousel-caption d-none d-md-block">
                                              <h5>University of Toronto</h5>
                                              <p>The University of Toronto is a public research university in Toronto, Ontario, Canada </p>
                                          </div>
                                      </div>
                                      <div class="carousel-item">
                                          <img src="images/universities/MIT.jpg" class="d-block w-100" alt="...">
                                          <div class="carousel-caption d-none d-md-block">
                                              <h5>Massachusetts Institute of Technology</h5>
                                              <p>Massachusetts Institute of Technology is a private land-grant research university in Cambridge, Massachusetts </p>
                                          </div>
                                      </div>
                                  </div>
                                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                  </button>
                              </div>
                          </div><br>
                          <!--                our Students-->
                          <div class="stu">
                              <h2>Our Students</h2>
                              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                  <div class="carousel-indicators">
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                  </div>
                                  <div class="carousel-inner">
                                      <div class="carousel-item active">
                                          <img src="images/students/indi.jpg" class="d-block w-100" alt="...">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="images/students/monti.jpg" class="d-block w-100" alt="...">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="images/students/sofi.jpg" class="d-block w-100" alt="...">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="images/students/ulala.jpg" class="d-block w-100" alt="...">
                                      </div>
                                      <div class="carousel-item">
                                          <img src="images/students/yeboi.jpg" class="d-block w-100" alt="...">
                                      </div>
                                  </div>
                                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

          <!-- Gallery -->
          <section id="gal" style="padding: 2% 0%;">
              <h2 style="text-align: center; font-size: em; font-weight: 700; padding: .4%; background-color: #84B082; color: #211A1E">Gallery</h2>
              <div class="gal">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                              <img src="images/universities/californiaUni.png" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                              <img src="images/universities/MIT.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                          </div>

                          <div class="col-lg-4 mb-4 mb-lg-0">
                              <img src="images/students/ulala.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                              <img src="images/gallery/10679551_869408109738376_2413601786072020091_o.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                          </div>

                          <div class="col-lg-4 mb-4 mb-lg-0">
                              <img src="images/gallery/615143-admission-fyjc-100717.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />

                              <img src="images/universities/melbourne.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="" />
                          </div>
                      </div>
                  </div>
              </div>
          </section>

          <!--    frequently asked questions-->
          <section id="faq">
              <h2>Frequently Asked Questions</h2>
              <div class="container">
                  <p>
                      <a class="btn" data-bs-toggle="collapse" href="#whyDa" role="button" aria-expanded="false" aria-controls="whyDa">
                          Why choose Dream Abroad?
                      </a>
                  </p>
                  <div class="collapse" id="whyDa">
                      <div class="card card-body">
                          Dream Abroad has a sole aim, to direct and guide students, to excellent potential overseas Institutions that can facilitate them to put up their future.
                          We resource, train, speak, mentor and encourage; we’ve trusted and experienced agents.
                          We have creative consultants work with new clients on various projects at a fast pace in reactive and diverse environments, so adaptable and creative individuals with high energy and enthusiasm will help you effortless
                          All kinds of study related problems in abroad, working in abroad & migration process, Dream Abroad is available to guide you. If you have any query related study, work permit and migration, we are available 24/7 Contact Us

                      </div>
                  </div>
                  <p>
                      <a class="btn" data-bs-toggle="collapse" href="#whySa" role="button" aria-expanded="false" aria-controls="whySa">
                          Why study Abroad?
                      </a>
                  </p>
                  <div class="collapse" id="whySa">
                      <div class="card card-body">
                          <ul>
                              <li> It’s a challenge.</li>
                              <li> Experience a different culture.</li>
                              <li> Top quality education.</li>
                              <li> Grow and develop personally</li>
                              <li> Learn new language.</li>
                              <li> Career opportunities.</li>
                              <li> Make new friends.</li>
                              <li> International Travel.</li>
                              <li> Become Independent.</li>
                              <li> Stories to last a lifetime</li>
                          </ul>
                      </div>
                  </div>
                  <p>
                      <a class="btn" data-bs-toggle="collapse" href="#ourMoto" role="button" aria-expanded="false" aria-controls="ourMoto">
                          Our Motive & Goals:
                      </a>
                  </p>
                  <div class="collapse" id="ourMoto">
                      <div class="card card-body">
                          In this modern era, the most important thing is Data. And without accurate and exact data we can't accomplish our different task.Here we beleive education is the most crucial part of this modern era. So, our motive is to deliver the vital data about higher education to all the interested students all over the world to make their dream come true, and help them to get more knowledge and most of all making this tough process much more easier for the interested students.
                      </div>
                  </div>
                  <p>
                      <a class="btn" data-bs-toggle="collapse" href="#whatWeDo" role="button" aria-expanded="false" aria-controls="whatWeDo">
                          What we do?
                      </a>
                  </p>
                  <div class="collapse" id="whatWeDo">
                      <div class="card card-body">
                          <ul>
                              <li> Give study abroad counselling and guidelines..</li>
                              <li> COMPLETE INFORMATION ABOUT EDUCATIONAL INSTITUTIONS</li>
                              <li> SCHOLARSHIP ASSISTANCE.</li>
                              <li> COURSE SELECTION</li>
                              <li> EXAMS AND COACHING</li>
                              <li> ACCOMMODATION ASSISTANCE</li>
                              <li> POST -ARRIVAL PROBLEM SOLVING</li>
                              <li> Complete your full admission process according to your choices/preferences.</li>
                              <li> Visa application assistance.</li>
                          </ul>
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
