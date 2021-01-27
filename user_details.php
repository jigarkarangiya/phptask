<?php session_start();
$pname = 'my_profile';
if (!isset($_SESSION['UserID'])) {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
   <head>
      <title>My Profile</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <style type="text/css">
         input.hidden {
         position: absolute;
         left: -9999px;
         }
         #profile-image1 {
         cursor: pointer;
         width: 130px;
         height:130px;
         border:2px solid red ;}
         .title{ font-size:16px; font-weight:500;}
         .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}
      </style>
   </head>
   <body>
      <?php include 'include/nav.php';?>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
              <div class="card">
  <div class="card-header">
    <h2 style="color:red;">User Profile</h2>
  </div>
  <?php include 'include/DBConfig.php';
$UserID = $_GET['UserID'];
$sql = "SELECT * FROM users where UserID='$UserID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
  <div class="card-body">
    <h5 class="card-title">
      <h4 style="color:red;"><?php echo $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName']; ?> (<?php echo $row['EnrNo']; ?>)</h4></h5>
    <p class="card-text">
    <table class="table">
      <tr>
        <td>
          <a href="images/<?php echo $row["ProfilePicUrl"]; ?>" class="fancybox">
                                 <img alt="User Pic" src="images/<?php echo $row["ProfilePicUrl"]; ?>" id="profile-image1" class="img-circle img-responsive">
                                </a>
        </td>
        <td>
          <p>
                                  <?php
$InstID = $row['InstID'];
$sqlInst = "SELECT * FROM `institutes` WHERE `InstID`=$InstID";
$resultInst = $conn->query($sqlInst);
$Inst = $resultInst->fetch_assoc();
echo $Inst['InstName'];

?>
                                 </p>
                                 <p>
                                    <?php
$UniverID = $row['UniverID'];
$sqlUniver = "SELECT * FROM `universities` WHERE `UniverID`=$UniverID";
$resultUniver = $conn->query($sqlUniver);
$Univer = $resultUniver->fetch_assoc();
echo $Univer['UniversityName'];

?>
                                 </p>
                                 <p>
                                 <?php
$CourseID = $row['CourseID'];
$sqlCourse = "SELECT * FROM `cources` WHERE `CourseID`=$CourseID";

$resultCourse = $conn->query($sqlCourse);
$Course = $resultCourse->fetch_assoc();
echo $Course['CourseName'];

?>
                                  (<?php echo $row['EnrolledYear']; ?>)</p>
                                 <p><a href="resumes/<?php echo $row["ResumeUrl"]; ?>" target="_blank" download class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i> Download Resume</a></p>
        </td>
      </tr>
    </table>
    <table class="table">
                <tr>
                  <td>Full Name :</td>
                  <td><?php echo $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName']; ?></td>
                </tr>
                <tr>
                  <td>Email :</td>
                  <td><a href="mailto:<?php echo $row["Email"]; ?>"><?php echo $row["Email"]; ?></a></td>
                </tr>
                <tr>
                  <td>Mobile No. :</td>
                  <td><a href="tel:<?php echo $row['MobileNo']; ?>"><?php echo $row['MobileNo']; ?></a></td>
                </tr>
                <tr>
                  <td>Date of Birth :</td>
                  <td><?php echo $row['DateofBirth']; ?></td>
                </tr>
                <tr>
                  <td>Gender :</td>
                  <td><?php echo $row['Gender']; ?></td>
                </tr>
                <tr>
                  <td>Category :</td>
                  <td><?php echo $row['Category']; ?></td>
                </tr>
                <tr>

                  <td>Address :</td>
<?php
//for city
$CityID = $row['CityID'];
$sqlCity = "SELECT * FROM `city` WHERE `CityID`=$CityID";
$resultCity = $conn->query($sqlCity);
$City = $resultCity->fetch_assoc();
//for state
$StateID = $row['StateID'];
$sqlState = "SELECT * FROM `states` WHERE `StateID`=$StateID";
$resultState = $conn->query($sqlState);
$State = $resultState->fetch_assoc();
//for country
$CountryID = $row['CountryID'];
$sqlCountry = "SELECT * FROM `country` WHERE `CountryID`=$CountryID";
$resultCountry = $conn->query($sqlCountry);
$Country = $resultCountry->fetch_assoc();
?>
                  <td><?php echo $row['Address'];
echo ",";
echo $City['CityName'];
echo "," . $State['StateName'] . "," . $Country['CountryName'] . "-" . $row['Pincode']; ?></td>
                </tr>

              </table>
  </p>

    <a href="list_all_users.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i>  Go Back</a>
    <a href="edit_user.php?UserID=<?php echo $row['UserID']; ?>" class="btn btn-danger"><i class="fa fa-edit"></i> Update</a>

  </div>
</div>



               </div>
            </div>

         </div>
      </div>
      <script type="text/javascript">
        $(".fancybox").fancybox();
      </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </body>
</html>
