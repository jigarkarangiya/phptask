<?php session_start();
$pname = "register";?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
    <link
      href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <style type="text/css">
      .custom-select
      {
      height: 40px;
      }
      h1,h2,h3
      {
         color: red;
      }
      form .error {
  color: #D9534F;
}
    </style>
  </head>
  <body>
    <?php include 'include/nav.php';?>
    <!-- Name Section -->
    <div class="row">
      <div class="container">
        <div class="col-md-8 col-md-offset-1">
          <form
            class="form-horizontal"
            role="form"
            method="POST"
            action="con_reg.php"
            enctype="multipart/form-data"
            name="RegistrationForm"
            onclick="return validateform()"
          >
            <h2>Register New User</h2>
            <br />
            <fieldset>
              <legend>Educational Details</legend>
              <div class="form-group">
                <div class="col-sm-6">
                  <label>University Name</label>
                  <select class="custom-select" name="UniverID" id="UniverID">
                    <option value="" selected="">
                      -- Select University --
                    </option>
                    <?php
include 'include/DBConfig.php';
$sqlUniversity = "SELECT * FROM universities";
$resultUniversity = $conn->query($sqlUniversity);
if ($resultUniversity->num_rows > 0) {
	while (
		$rowUniversity = $resultUniversity->fetch_assoc()
	) {?>

                    <option value="<?php echo $rowUniversity['UniverID']; ?>">
                      <?php echo $rowUniversity['UniversityName']; ?>
                    </option>

                    <?php }
}
?>
                  </select>
                </div>
                <div class="col-sm-6">
                  <label>Institute Name</label>
                  <select class="custom-select" name="InstID" id="InstID">
                    <option value="" selected="">
                      -- Select Institute --
                    </option>
                    <?php
$sqlInstitute = "SELECT * FROM institutes";
$resultInstitute = $conn->query($sqlInstitute);
if ($resultInstitute->num_rows > 0) {
	while (
		$rowInstitute = $resultInstitute->fetch_assoc()
	) {?>

                    <option value="<?php echo $rowInstitute['InstID']; ?>">
                      <?php echo $rowInstitute['InstName']; ?>
                    </option>
                    <?php }
}
?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4">
                  <label>Course Name</label>
                  <select class="custom-select" name="CourseID">
                    <option value="">
                      -- Select Course Name --
                    </option>
                    <?php
$sqlcourses = "SELECT * FROM cources";
$resultcourses = $conn->query($sqlcourses);
if ($resultcourses->num_rows > 0) {
	while ($rowcourses = $resultcourses->fetch_assoc()) {?>

                    <option value="<?php echo $rowcourses['CourseID']; ?>">
                      <?php echo $rowcourses['CourseName']; ?>
                    </option>
                    <?php }
}
?>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label>Enrollnment No.</label>
                  <input
                    type="number"
                    name="EnrNo"
                    id="EnrNo"
                    placeholder="Enrollnment No."
                    class="form-control"
                  />
                </div>
                <div class="col-sm-4">
                  <label>Enrolled Year</label>
                  <input
                    type="number"
                    name="EnrolledYear"
                    id="EnrolledYear"
                    placeholder="Enrolled Year"
                    class="form-control"
                  />
                </div>
              </div>
              <br />
              <!-- Form Name -->
              <legend>Personal Details</legend>
              <!-- Text input-->
              <div class="form-group">
                <div class="col-sm-4">
                  <label>First Name</label>
                  <input
                    type="text"
                    name="FirstName"
                    id="FirstName"
                    placeholder="First Name"
                    maxlength="16"
                    minlenth="2"
                    class="form-control"
                    onkeypress="return /[a-z]/i.test(event.key)"
                  />
                </div>
                <div class="col-sm-4">
                  <label>Middle Name</label>
                  <input
                    type="text"
                    name="MiddleName"
                    id="MiddleName"
                    placeholder="Middle Name"
                    maxlength="16"
                    minlenth="1"
                    class="form-control"
                    onkeypress="return /[a-z]/i.test(event.key)"
                  />
                </div>
                <div class="col-sm-4">
                  <label>Last Name</label>
                  <input
                    type="text"
                    name="LastName"
                    id="LastName"
                    placeholder="Last Name"
                    maxlength="16"
                    minlenth="2"
                    class="form-control"
                    onkeypress="return /[a-z]/i.test(event.key)"
                  />
                </div>
              </div>
              <!-- Text input-->
              <div class="form-group">
                <div class="col-sm-4">
                  <label>Date of Birth</label>
                  <input
                    type="date"
                    id="DateofBirth"
                    class="form-control"
                    name="DateofBirth"
                  />
                </div>
                <div class="col-sm-4">
                  <label>Gender</label>
                  <br />
                  <input type="radio" name="Gender" id="Gender" value="Male" checked /> Male
                  <input type="radio" name="Gender" id="Gender" value="Female" /> Female
                </div>
                <div class="col-sm-4">
                  <label>Category</label>
                  <select class="custom-select" name="Category" id="Category">
                    <option value="" selected="">Select Category</option>
                    <option value="Open">Open</option>
                    <option value="SEBC">SEBC</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4">
                  <label>Address</label>
                  <textarea name="Address" class="form-control" id="Address"></textarea>
                </div>
                <div class="col-sm-4">
                  <label>Profile Photo</label>
                  <input
                    type="file"
                    name="ProfilePicUrl"
                    class="form-control custom-select"
                    accept="image/jpg,image/png,image/jpeg,image/gif"
                    id="ProfilePicUrl"
                  />
                </div>
                <div class="col-sm-4">
                  <label>Upload Resume</label>
                  <input
                    type="file"
                    name="ResumeUrl"
                    class="form-control custom-select"
                    id="ResumeUrl"
                    accept=".pdf,.docx,.doc"
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3">
                  <label>Country</label>
                  <select class="custom-select" name="CountryID" id="CountryID">
                    <option>Select Country</option>
                  <?php
include "include/DBConfig.php";
$CountryResult = mysqli_query($conn, "SELECT * FROM country");
while ($rowCountry = mysqli_fetch_array($CountryResult)) {
	?>
<option value="<?php echo $rowCountry['CountryID']; ?>"><?php echo $rowCountry["CountryName"]; ?></option>
<?php
}
?>
</select>
                </div>
                <div class="col-sm-3">
                  <label>State</label>
                  <select class="custom-select" name="StateID" id="StateID">
                    <option>Select State</option>
                  </select>
                </div>
                <div class="col-sm-3">
                  <label>City</label>
                  <select class="custom-select" name="CityID" id="CityID">
                    <option>Select City</option>
                  </select>
                </div>
                <div class="col-sm-3">
                  <label>Pincode</label>
                  <input
                    type="number"
                    id="Pincode"
                    name="Pincode"
                    placeholder="Pin Code"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Email ID</label>
                  <input
                    type="text"
                    name="Email"
                    id="Email"
                    placeholder="Email ID"
                    class="form-control"
                  />
                </div>
                <div class="col-sm-6">
                  <label>Confirm Email ID</label>
                  <input
                    type="Email"
                    name="CnfEmail"
                    id="CnfEmail"
                    placeholder="Confirm Email ID"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4">
                  <label>Mobile Number</label>
                  <input
                    type="number"
                    name="MobileNo"
                    placeholder="Enter Mobile Number"
                    id="MobileNo"
                    class="form-control"
                  />
                </div>
                <div class="col-sm-4">
                  <label>Password</label>
                  <input
                    type="password"
                    name="Password"
                    id="Password"
                    placeholder="Enter Password"
                    class="form-control"
                  />
                </div>
                <div class="col-sm-4">
                  <label>Confirm Password</label>
                  <input
                    type="password"
                    name="CnfPassword"
                    id="CnfPassword"
                    placeholder="Confirm Password"
                    class="form-control"
                  />
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-5 col-sm-offset-1">
                  <div class="pull-right">
                    <input
                      name="submit"
                      type="submit"
                      id="submit"
                      class="btn btn-danger"
                      value="Register"
                    />
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <!-- <script src="register_validate.js"></script> -->
<script type="text/javascript">

$(function() {

  $("form[name='RegistrationForm']").validate({
    rules: {
      UniverID: "required",
      InstID: "required",
      CourseID: "required",
      EnrolledYear: {
        required:true,
        maxlength:4,
        minlength:4
      },
      DateofBirth: "required",
      Gender: "required",
      Category: "required",

      Address: {
      required:true,
      maxlength:150
      },
      Pincode: {
      required:true,
      maxlength:6,
      minlength:6
      },
      ProfilePicUrl: "required",
      ResumeUrl: "required",
      FirstName: "required",
      MiddleName:"required",
      LastName: "required",

      MobileNo:{
        minlength:10,
        maxlength:10,
        required:true
      },

      Email:{
        required: true,
      },
      Password: {
        required:true,
        minlength: 5,
        maxlength: 12
      },
      EnrNo: {
        required: true,
        minlength : 4,
        maxlength : 12
      },
      CnfPassword: {
        required: true,
        equalTo:"#Password"
      },
      CnfEmail:{
        required:true,
        equalTo:"#Email"
      }

    //end of rules
    },


    // Specify validation error messages
    messages: {
      UniverID: "Please Select University",
      InstID: "Please Select Institute",
      CourseID: "Please Select Course",
      EnrNo: {
        required : "Please Enter Enrollnment No",
        minlength: "Minimum lenght is 4",
        maxlength: "Max lenght is 12"
      },
      EnrolledYear: {
        required : "Please Enter Enrolled Year",
        minlength:"Year should be of 4 digits",
        maxlength:"Year should be of 4 digits"
      },
      Pincode:
      {
        required: "Please Enter Pincode",
        maxlength:"Please Enter valid 6 digit pincode",
        minlength:"Please Enter valid 6 digit pincode"
      },
      Category: "Please Select Category ",
      Address: {
        required:"Please Enter Address",
        maxlength:"Address is too large"
      },
      ProfilePicUrl: "Please Upload Profile Pic",
      ResumeUrl: "Please Upload Resume",
      DateofBirth: "Please Select DOB",
      Gender: "Please Select Gender",
      FirstName: "First Name is Required",
      MiddleName: "Middle Name is Required",
      LastName: "Last Name is Required",
      MobileNo:
      {
        required:"Please Enter Mobile Number",
        maxlength:"Please Enter Valid 10 Digit No.",
        minlength:"Please Enter Valid 10 Digit No."
      },
      CnfPassword:
      {
        required:"Please Enter Confirm Password",
        equalTo:"Password and Confirm Password Doesn't Match"
      },
      CnfEmail:
      {
        required:"Please Enter Confirm Email",
        equalTo:"Email and Confirm Email Doesn't Match"
      },
      Email: {
        required:"Please enter email address",
        email:"please  enter valid email"},
      Password: {
        required: "Please Provide a Password",
        minlength: "Enter password of minimum 5 characters",
        maxlength: "Maximum password length allowed is 12"
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
    </script>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js'></script>
<!-- script for dependent dropdown -->
<script>
$(document).ready(function() {
$('#CountryID').on('change', function() {
var CountryID = this.value;
$.ajax({
url: "states_by_country.php",
type: "POST",
data: {
CountryID: CountryID
},
cache: false,
success: function(result){
$("#StateID").html(result);
$('#CityID').html('<option value="">Select State First</option>');
}
});
});
$('#StateID').on('change', function() {
var StateID = this.value;
$.ajax({
url: "cities_by_state.php",
type: "POST",
data: {
StateID: StateID
},
cache: false,
success: function(result){
$("#CityID").html(result);
}
});
});
});
</script>
  </body>
</html>
