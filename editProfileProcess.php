<!-- First name lastName fatherName, motherName religion,nationality occupation,jobInstitute  phoneNumber oldPass inputdob, inputNID changeImg
    inputStreet,inputCity inputDistrict,inputState inputZip, inputCountry
    examDegree1,group1,gpa1, year1,institution1,board1
    examDegree2,group2,gpa2,year2,institution2,board2
    examDegree3,group3,gpa3,year3,institution3
    examDegree4,group4,gpa4,year4,institution4 -->

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

            $oldpass=$_POST['oldPass'];

            $returnobj=$conn->query("SELECT * from userprofile WHERE userID=$id");
            $temp_profile = $returnobj->fetch();   //Fetching a single row then signle column, single value

            $enc_pass_db=$temp_profile['password'];
            $enc_pass_old=md5($oldpass); //Password encryption

            if($enc_pass_old==$enc_pass_db){
                //password matched
                $firstName=$_POST['firstName'];
                $lastName=$_POST['lastName'];
                $fathername=$_POST['fatherName'];
                $mothername=$_POST['motherName'];
                $religion=$_POST['religion'];
                $nationality=$_POST['nationality'];
                $dob=$_POST['inputdob'];
                $nid=$_POST['inputNID'];
                $phone=$_POST['phoneNumber'];
                $occupation= $_POST['occupation'];
                $jobInstitute= $_POST['jobInstitute'];

                $updateUserQuery="  UPDATE userprofile
                                    SET firstName='$firstName',
                                        lastName='$lastName',
                                        fatherName='$fathername',
                                        motherName='$mothername',
                                        religion='$religion',
                                        nationality='$nationality',
                                        dob='$dob',
                                        nidPassport='$nid',
                                        phoneNumber='$phone',
                                        occupation='$occupation',
                                        job_institute='$jobInstitute'
                                    WHERE userID=$id";
                $conn->exec($updateUserQuery);

                $street=$_POST['inputStreet'];
                $city=$_POST['inputCity'];
                $district=$_POST['inputDistrict'];
                $state=$_POST['inputState'];
                $zip= $_POST['inputZip'];
                $country=$_POST['inputCountry'];

                $updateAddrQuery="  UPDATE address
                                    SET street='$street',
                                        city='$city',
                                        district='$district',
                                        state='$state',
                                        zipCode='$zip',
                                        country='$country'
                                    WHERE userProfile_userID=$id";
                $conn->exec($updateAddrQuery);

                $examDegree1=$_POST['examDegree1'];
                $group1=$_POST['group1'];
                $gpa1=$_POST['gpa1'];
                $year1=$_POST['year1'];
                $institution1=$_POST['institution1'];
                $board1=$_POST['board1'];

                $examDegree2=$_POST['examDegree2'];
                $group2=$_POST['group2'];
                $gpa2=$_POST['gpa2'];
                $year2=$_POST['year2'];
                $institution2=$_POST['institution2'];
                $board2=$_POST['board2'];

                $examDegree3=$_POST['examDegree3'];
                $group3=$_POST['group3'];
                $gpa3=$_POST['gpa3'];
                $year3=$_POST['year3'];
                $institution3=$_POST['institution3'];

                $examDegree4=$_POST['examDegree4'];
                $group4=$_POST['group4'];
                $gpa4=$_POST['gpa4'];
                $year4=$_POST['year4'];
                $institution4=$_POST['institution4'];

                $updateEduQuery="  UPDATE education
                                      SET exam_ssc='$examDegree1',
                                          group_ssc='$group1',
                                          gpa_ssc='$gpa1',
                                          year_ssc='$year1',
                                          institute_ssc='$institution1',
                                          board_ssc='$board1',
                                          exam_hsc='$examDegree2',
                                          group_hsc='$group2',
                                          gpa_hsc='$gpa2',
                                          year_hsc='$year2',
                                          institute_hsc='$institution2',
                                          board_hsc='$board2',
                                          undergrad='$examDegree3',
                                          ug_program='$group3',
                                          ug_cgpa='$gpa3',
                                          ug_year='$year3',
                                          ug_institute='$institution3',
                                          graduate='$examDegree4',
                                          g_program='$group4',
                                          g_cgpa='$gpa4',
                                          g_year='$year4',
                                          g_institute='$institution4'
                                    WHERE userProfile_userID=$id";

                $conn->exec($updateEduQuery);

                if(
                      isset($_FILES['changeImg'])
                  &&  !empty($_FILES['changeImg'])
                ){
                      //if the image value setted from html FORM
                      $newimg=$_FILES['changeImg'];
                      $image_name=$newimg['name'];      // New image name
                      $image_tmp_path=$newimg['tmp_name'];
                      $to="images/profile_picture/$image_name"; ///new Image path
                      
                      if($to == "images/profile_picture/"){  
                            //if no image selected
                           ?> <script>location.assign("home.php");</script> <?php
                      }
                      else{
                          //Image selected for the first time or further upload to update profile picture
                          //query to store previous imagepath from database
                          $sqlQuery = $conn->query("SELECT profilePic FROM userprofile WHERE userID=$id");
                          $temp = $sqlQuery->fetch();
                          $path = $temp['profilePic'];  //delete an image from localserver when it deleted from the website
                          if($to != $path){     //if new image and previously uploaded image doesn't match
                                $conn->exec("UPDATE userprofile SET profilepic='$to' WHERE userID=$id");
                                move_uploaded_file($image_tmp_path, $to);
                                unlink($path); //delete the previous uploaded imagefile from the server
                            }    
                          ?>
                            <script>location.assign("home.php");</script>
                          <?php
                      }
                }
                else{
                    //if no image choosen
                     ?> <script>location.assign("home.php");</script> <?php
                }
            }
            else{
                //old password not match
                ?>
                <script>location.assign("editProfile.php");</script>
                <?php
            }
      }
      catch(PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
      }
}
else{
  //$_SEESION variable isn't set and/or $_SESSION variable is empty
  ?>
    <script>location.assign("login.php");</script>
  <?php
}
?>
