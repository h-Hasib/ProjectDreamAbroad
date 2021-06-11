<?php
session_start();
if(
        isset($_SESSION['admin_ID'])
    &&  !empty($_SESSION['admin_ID'])
){
    //user already logged in
    $id=$_SESSION['admin_ID'];
    try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $loginQuery="SELECT * from adminprofile WHERE admin_ID=$id";
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

            <title>Admin Resources</title>

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

            <!--hotline contactact section-->
            <section id="hotline">
                <div class="container hotline">
                    <div class="row">
                        <h1><b>Resources</b></h1>
                    </div>
                </div>
            </section><br><br>
           
            <section id="uniFinder">
            <?php
                try{
                    $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $mysqlquery="SELECT* FROM resources";

                    $returnTableObj=$conn->query($mysqlquery);
                    $returnTable=$returnTableObj->fetchAll();
                    // Write the code of Table
                    ?>
                    <br><table class="content-table">
                        <thead>
                            <td>
                            <br><input type="button" class="btn" value="Add Resource" style="background-color: DodgerBlue; color: white; border-radius:9px" onclick="addResourcefn();"><br><br>
                            </td>
                        </thead>
                    </table><br>
                    <!-- create the main table containing PROFESSOR INFORMATION -->
                    <table class="content-table">
                        <thead>
                            <br><tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>UploadDate</th>
                                <th>introVedio</th>
                                <th>About</th>
                                <th>NextExam</th>
                                <th>Image</th>
                                <th>official web</th>
                                <th>GDrive</th>
                                <th>PDF</th>
                                <th>More Resources</th>
                                <th>Update/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if($returnTableObj->rowCount()==0){ //Database return nothing
                            ?>
                                    <tr>
                                        <td colspan="10"><p style="color: red "><b>Sorry! No Data Found In The Database, Please Insert Authentic Data.</b></p></td>
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
                                        <td><?php echo $row['resource_ID']?></td>
                                        <td><?php echo $row['resourceCategory']?></td>
                                        <td><?php echo $row['uploadDate']?></td>
                                        <td><a href="<?php echo $row['introVedioLink']?>" target="_blank"><?php echo $row['introVedioLink']?></a></td>
                                        <td><?php echo $row['about']?></td> 
                                        <td><?php echo $row['nextExamDate']?></td>
                                        <td><?php echo $row['imagePath']?></td>
                                        <td><a href="<?php echo $row['officialLink']?>" target="_blank"><?php echo $row['officialLink']?></a></td>
                                        <td><a href="<?php echo $row['gDriveLink']?>" target="_blank"><?php echo $row['gDriveLink']?></a></td>
                                        <td><?php echo $row['pdfPath']?></a></td>
                                        <td><a href="<?php echo $row['moreLink']?>" target="_blank"><?php echo $row['moreLink']?></a></td>
                                        <td>
                                            <br><input type="button" class="btn" value="Update" style="background-color: DodgerBlue; color: white; border-radius:9px" onclick="updatefn(<?php echo $row['resource_ID']?>)"> <br><br>
                                            <input type="button" class="btn" value="Delete" style="background-color: red; color:white; border-radius:9px" onclick="deletefn(<?php echo $row['resource_ID']?>)"><br><br>
                                            
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }    
                            ?>
                        </tbody> 
                    </table><br><br><br><br>
                <?php     
                }
                catch(PDOException $e){
                        echo 'Connection failed: ' . $e->getMessage();
                }
            ?>
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
            
        <script>
            function addResourcefn(){
                location.assign("adminResourceAdd.php");
            }
            function updatefn(rid){
                //for multiple var,values: file.php?var1=value & var2=val2
                location.assign("adminResourceUpdate.php?res_id="+rid); //for GET not POST method
            }
            function deletefn(rid){
                location.assign("adminResourceDelete.php?res_id="+rid);
            }
        </script>
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
