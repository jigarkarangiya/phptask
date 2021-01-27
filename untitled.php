<?php
session_start();
if (!isset($_SESSION['UserID'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Registration Page</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
      <style type="text/css">
         .custom-select
         {
         height: 35px;
         }
         h1,h2,h3
         {
         color: red;
         }
      </style>
   </head>
   <body>
      <?php include 'include/nav.php';?>
      <div class="row">
         <div class="container">
            <div class="col-md-8 col-md-offset-1">
               <form class="form-horizontal" role="form" method="POST" action="con_edit_user.php" enctype="multipart/form-data" name="RegistrationForm" onsubmit="return validateform()">
                  <h2>Update User Profile</h2>
                  <br>
                  <?php include 'include/DBConfig.php';
$UserID = $_GET['UserID'];
$sql = "SELECT * FROM users where UserID='$UserID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
/*echo "<pre>";
print_r($row);
die();*/
?>
                  <fieldset>
                     <legend>Educational Details</legend>
                     <div class="form-group">
                        <div class="col-sm-6">
                           <input type="hidden" name="UserID" value="<?php echo $row['UserID']; ?>">
                           <label>University Name</label>
                           <select class="custom-select" name="UniverID">
                              <option value=""> -- Select University -- </option>
                              <?php include 'include/DBConfig.php';

$sqlUniversity = "SELECT * FROM universities";
// echo $sqlUniversity;die();
$resultUniversity = $conn->query($sqlUniversity);
/*echo $resultUniversity;
die();*/
if ($resultUniversity->num_rows > 0) {
	$selected = "";

	while ($rowUniversity = $resultUniversity->fetch_assoc()) {

		if ($row["UniverID"] == $rowUniversity['UniverID']) {
			$selected = "selected='selected'";
		}
		?>
                              <option
                              value="<?php echo $rowUniversity['UniverID']; ?>"
                                 <?php echo $selected; ?>>
                                 <?php echo $rowUniversity['UniversityName']; ?>
                                 </option>
                              <?php
}
}
?>
                           </select>
                        </div>
                        <div class="col-sm-6">
                           <label>Institute Name</label>
                           <select class="custom-select" name="InstID">
                              <?php
$sqlInstitute = "SELECT * FROM institutes";
$resultInstitute = $conn->query($sqlInstitute);
if ($resultInstitute->num_rows > 0) {
	while ($rowInstitute = $resultInstitute->fetch_assoc()) {

		?>
                              <option value="<?php echo $rowInstitute['InstID']; ?>" <?php echo $selected; ?>>
                                 <?php echo $rowInstitute['InstName']; ?></option>
                              <?php
}
}?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <label>Course Name</label>
                           <select class="custom-select" name="CourseID">
                              <option value="" selected=""> -- Select Course Name -- </option>
                              <?php
$sqlcourses = "SELECT * FROM cources";
$resultcourses = $conn->query($sqlcourses);
if ($resultcourses->num_rows > 0) {
	while ($rowcourses = $resultcourses->fetch_assoc()) {

		?>
                              <option value="<?php echo $rowcourses['CourseID']; ?>"><?php echo $rowcourses['CourseName']; ?></option>
                              <?php
}
}?>
                           </select>
                        </div>
                        <div class="col-sm-4">
                           <label>Enrollnment No.</label>
                           <input type="number" name="EnrNo" placeholder="Enrollnment No." maxlength="12" minlength="5" class="form-control" value="<?php echo $row['EnrNo']; ?>">
                        </div>
                        <div class="col-sm-4">
                           <label>Enrolled Year</label>
                           <input type="text" name="EnrolledYear" placeholder="Enrolled year" class="form-control" value="<?php echo $row['EnrolledYear']; ?>">
                        </div>
                     </div>
                     <br>
                     <!-- Form Name -->
                     <legend>Personal Details</legend>
                     <!-- Text input-->
                     <div class="form-group">
                        <div class="col-sm-4">
                           <label>First Name</label>
                           <input type="text" name="FirstName" placeholder="First Name" class="form-control" value="<?php echo $row['FirstName']; ?>">
                        </div>
                        <div class="col-sm-4">
                           <label>Middle Name</label>
                           <input type="text" name="MiddleName" placeholder="Middle Name" class="form-control" value="<?php echo $row['MiddleName']; ?>">
                        </div>
                        <div class="col-sm-4">
                           <label>Last Name</label>
                           <input type="text" name="LastName" placeholder="Last Name" class="form-control" value="<?php echo $row['LastName']; ?>">
                        </div>
                     </div>
                     <!-- Text input-->
                     <div class="form-group">
                        <div class="col-sm-4">
                           <label>Date of Birth</label>
                           <input type="date" placeholder="Date Of Birth" class="form-control" name="DateofBirth" value="<?php echo $row['DateofBirth']; ?>">
                        </div>
                        <div class="col-sm-4">
                           <label>Gender</label>
                           <br>
                           <input type="radio" name="Gender" value="Male" <?php if ($row['Gender'] == 'Male') {
	echo "checked";
}?>> Male
                           <input type="radio" name="Gender" value="Female" <?php if ($row['Gender'] == 'Female') {
	echo "checked";
}?>> Female
                        </div>
                        <div class="col-sm-4">
                           <label>Category</label>
                           <select class="custom-select" name="Category">
                              <option value="" selected="">Select Category</option>
                              <option value="Open">Open</option>
                              <option value="SEBC">SEBC</option>
                              <option value="SC">SC</option>
                              <option value="ST">ST</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-6">
                           <label>Address</label>
                           <textarea name="Address" class="form-control"><?php echo $row['Address']; ?></textarea>
                        </div>
                        <div class="col-sm-6">
                           <label>Profile Photo</label>
                           <input type="file" name="ProfilePicUrl" class="form-control custom-select"><img src="images/<?php echo $row['ProfilePicUrl']; ?>" width="30px" height="30px">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <label>State</label>
                           <select class="custom-select" name="State">
                              <option selected>Select State</option>
                              <option value="ANDAMAN AND NICOBAR ISLANDS">ANDAMAN AND NICOBAR ISLANDS</option>
                              <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                              <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                              <option value="ASSAM">ASSAM</option>
                              <option value="BIHAR">BIHAR</option>
                              <option value="CHATTISGARH">CHATTISGARH</option>
                              <option value="CHANDIGARH">CHANDIGARH</option>
                              <option value="DAMAN AND DIU">DAMAN AND DIU</option>
                              <option value="DELHI">DELHI</option>
                              <option value="DADRA AND NAGAR HAVELI">DADRA AND NAGAR HAVELI</option>
                              <option value="GOA">GOA</option>
                              <option value="GUJARAT">GUJARAT</option>
                              <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                              <option value="HARYANA">HARYANA</option>
                              <option value="JAMMU AND KASHMIR">JAMMU AND KASHMIR</option>
                              <option value="JHARKHAND">JHARKHAND</option>
                              <option value="KERALA">KERALA</option>
                              <option value="KARNATAKA">KARNATAKA</option>
                              <option value="LAKSHADWEEP">LAKSHADWEEP</option>
                              <option value="MEGHALAYA">MEGHALAYA</option>
                              <option value="MAHARASHTRA">MAHARASHTRA</option>
                              <option value="MANIPUR">MANIPUR</option>
                              <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                              <option value="MIZORAM">MIZORAM</option>
                              <option value="NAGALAND">NAGALAND</option>
                              <option value="ORISSA">ORISSA</option>
                              <option value="PUNJAB">PUNJAB</option>
                              <option value="PONDICHERRY">PONDICHERRY</option>
                              <option value="RAJASTHAN">RAJASTHAN</option>
                              <option value="SIKKIM">SIKKIM</option>
                              <option value="TAMIL NADU">TAMIL NADU</option>
                              <option value="TRIPURA">TRIPURA</option>
                              <option value="UTTARAKHAND">UTTARAKHAND</option>
                              <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                              <option value="WEST BENGAL">WEST BENGAL</option>
                              <option value="TELANGANA">TELANGANA</option>
                           </select>
                        </div>
                        <div class="col-sm-4">
                           <label>City</label>
                           <select class="custom-select" name="City">
                              <option selected>Select City</option>
                              <option value="Ahmedabad">Ahmedabad</option>
                              <option value="Surat">Surat</option>
                              <option value="Vadodara">Vadodara</option>
                              <option value="Rajkot">Rajkot</option>
                              <option value="Bhavnagar">Bhavnagar</option>
                              <option value="Jamnagar">Jamnagar</option>
                              <option value="Junagadh">Junagadh</option>
                              <option value="Gandhinagar">Gandhinagar</option>
                              <option value="Anand">Anand</option>
                           </select>
                        </div>
                        <div class="col-sm-4">
                           <label>Pincode</label>
                           <input type="text" name="Pincode" placeholder="Pin Code" class="form-control" value="<?php echo $row['Pincode']; ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-6">
                           <label>Email ID</label>
                           <input type="Email" name="Email" placeholder="Email ID" class="form-control" value="<?php echo $row['Email']; ?>">
                        </div>
                        <div class="col-sm-6">
                           <label>Confirm Email ID</label>
                           <input type="Email" name="CnfEmail" placeholder="Confirm Email ID" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <label>Mobile Number</label>
                           <input type="number" name="MobileNo" placeholder="Enter Mobile Number" class="form-control" minlength="10" maxlength="10" value="<?php echo $row['MobileNo']; ?>">
                        </div>
                        <div class="col-sm-4">
                           <label>Password</label>
                           <input type="password" name="Password" minlength="8" maxlength="12" placeholder="Enter Password" class="form-control" value="<?php echo $row['Password']; ?>">
                        </div>
                        <div class="col-sm-4">
                           <label>Confirm Password</label>
                           <input type="password" name="CnfPassword" placeholder="Confirm Password" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-1">
                           <div class="pull-right">
                              <input type="submit" onclick="myFunction()" class="btn btn-danger" value="Update">
                           </div>
                        </div>
                     </div>
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
      <script src="register_validate.js"></script>
   </body>
</html>
