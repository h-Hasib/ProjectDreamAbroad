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
    <title>Admin LogIn</title>
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
                    <div class="navbar-nav  ml-auto "></div>
                </div>
            </div>
        </nav>
    </section>
    <!--hotline contactact section-->
    <section id="hotline">
        <div class="container hotline">
            <div class="row">
                <h3><b>WELCOME TO ADMIN PANEL</b></h3>
            </div>
        </div>
    </section>

    <!--Login-->
    <section id="form">
        <div class="container regForm">
            <h1>Log In With Your Admin Email and Password</h1><br>
            <form action="adminloginProcess.php" method=POST>
                <div class="form-group form-floating">
                    <input type="email" class="form-control bright" id="adminEmail" aria-describedby="adminEmail" placeholder="Your admin Email" name="adminEmail" required>
                    <label for="adminEmail">Admin Email address</label>
                </div><br>
                <div class="row">
                    <div class="col-md form-group">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="adminPass" placeholder="adminPassword" name="adminPass" required>
                            <label for="adminPass">Admin Password</label>
                        </div>
                    </div>
                </div><br>
                <input type="submit" value="Log In"  class="btn btn-lg"></input>
            </form><br>
        </div>
    </section>

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
