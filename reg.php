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

    <title>Registration</title>
</head>

<body>
    <!--navigation section-->
    <section id="#navbar">
        <nav class="navbar navbar-expand-lg" data-aos="fade-right;" data-aos-delay="1500">
            <div class="container-fluid navigation">
                <a class="navbar-brand" href="#"><img class="logo" alt="">Dream Abroad</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span style="color: white; border: none !important;"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                </div>
            </div>
        </nav>
    </section>

    <!--hotline contactact section-->
    <section id="hotline">
        <div class="container hotline">
            <div class="row">
                <div class="col-md-6">
                    <p> <i class="fas fa-phone-alt"></i> Hotline: +880 XXXX XXXXXX</p>
                </div>
                <div class="col-md-6">
                    <p> <i class="fas fa-envelope"></i> Email: contact@dreamabroad.com</p><br>
                </div>
            </div>
        </div>
    </section>

    <!--    Registration Section-->
    <section id="form">
        <div class="container regForm">
            <h1>Registration Form</h1><br>
                <!--List of variable firstName, lastName, gender, userEmail,phoneNumber, userPass1, userPass2,, termsAgreement-->
             <form action="regProcess.php" method="POST" oninput='userPass2.setCustomValidity(userPass2.value != userPass1.value ? "Passwords do not match." : "")'>
                <!-- for firstName, lastName -->
                <div class="row">
                    <div class="col form-group form-floating">
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name" id="firstName" name="firstName" required>
                        <label for="firstName">First Name</label>
                    </div>
                    <div class="col form-group form-floating">
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="lastName" name="lastName" required>
                        <label for="lastName"  >Last Name</label>
                    </div>
                </div><br>
                <!-- for gender -->
                <div class="input-group ">
                    <select name="gender" id="gender" name="gender" style="border: none; border-bottom: 2px solid #211A1E; width: 100%">
                        <option value="null">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div><br>
                <!-- for userEmail -->
                <div class="form-group form-floating">
                    <input type="email" class="form-control bright" id="userEmail" aria-describedby="userEmail" placeholder="Your Email" id="userEmail" name="userEmail" required>
                    <label for="userEmail">Email address</label>
                </div><br>
                <!-- for phoneNumber -->
                <div class="form-group form-floating">
                    <input type="phone" class="form-control bright" id="phoneNumber" name="phoneNumber" aria-describedby="phoneNumber" placeholder="Your Phone Number" id="phoneNumber" required>
                    <label for="phoneNumber">Phone Number</label>
                </div><br>
                <!-- for userPass1, userPass2 -->
                <div class="row">
                    <div class="col-md-6 form-group">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="userPass1" placeholder="Password" name="userPass1" required>
                            <label for="userPass1">Password</label>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="userPass2" placeholder="Confirm Password" name="userPass2" required>
                            <label for="userPass2">Confirm password</label>
                        </div>
                    </div>
                </div><br>
                <!-- for checkbox[terms aggreement]-> termsAgreement -->
                <div class="form-check" style="padding-top: 2%;">
                    <input class="form-check-input" type="checkbox" value="" id="termsAgreement" name="termsAgreement" style="border: 1px solid black;" required>
                    <label class="form-check-label" for="termsAgreement">
                        I agree the terms and conditions of Dreamers Abroad
                    </label>
                </div><br><br>

                <input type="submit" value="Create Account" class="btn btn-lg"></input>
            </form><br>

            <br><p>ALready have an account? <a href="login.php"> Log In</a></p>
        </div>
    </section>

    <!--footer section-->
    <section id="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 contact">
                    <!--                   contact-->
                    <h2>Contact Us</h2>
                    <p> <i class="fas fa-phone-alt"></i> Hotline: +880 1111 111 111</p>
                    <p> <i class="fas fa-envelope"></i> Email: contact@dreamabroad.com</p>
                    <p> <i class="fas fa-map-marker-alt"></i> Address: Vatara, Dhaka 1212, Bangladesh</p>
                </div>
                <div class="col-lg-6 social">
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

    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</body>

</html>
