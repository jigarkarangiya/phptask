<?php
session_start();
$pname = "import";
if (!isset($_SESSION['UserID'])) {
	header("location: login.php");
}
?>
<?php
include 'include/DBConfig.php';
if (isset($_POST["submit"])) {
	if ($_FILES['file']['name']) {
		$filename = explode(".", $_FILES['file']['name']);
		if ($filename[1] == 'csv') {

			$handle = fopen($_FILES['file']['tmp_name'], "r");
			while ($data = fgetcsv($handle)) {
				$FirstName = mysqli_real_escape_string($conn, $data[1]);
				$MiddleName = mysqli_real_escape_string($conn, $data[2]);
				$LastName = mysqli_real_escape_string($conn, $data[3]);
				$ProfilePicUrl = mysqli_real_escape_string($conn, $data[4]);
				$ResumeUrl = mysqli_real_escape_string($conn, $data[5]);
				$UniverID = mysqli_real_escape_string($conn, $data[6]);
				$InstID = mysqli_real_escape_string($conn, $data[7]);
				$CourseID = mysqli_real_escape_string($conn, $data[8]);
				$EnrNo = mysqli_real_escape_string($conn, $data[9]);
				$EnrolledYear = mysqli_real_escape_string($conn, $data[10]);
				$DateofBirth = mysqli_real_escape_string($conn, $data[11]);
				$Gender = mysqli_real_escape_string($conn, $data[12]);
				$Category = mysqli_real_escape_string($conn, $data[13]);
				$Address = mysqli_real_escape_string($conn, $data[14]);
				$CountryID = mysqli_real_escape_string($conn, $data[15]);
				$StateID = mysqli_real_escape_string($conn, $data[16]);
				$CityID = mysqli_real_escape_string($conn, $data[17]);
				$Pincode = mysqli_real_escape_string($conn, $data[18]);
				$Email = mysqli_real_escape_string($conn, $data[19]);
				$MobileNo = mysqli_real_escape_string($conn, $data[20]);
				$Password = mysqli_real_escape_string($conn, $data[21]);

				$query = "INSERT INTO `users` (`UserID`, `FirstName`, `MiddleName`, `LastName`, `ProfilePicUrl`,`ResumeUrl`, `UniverID`, `InstID`, `CourseID`, `EnrNo`, `EnrolledYear`, `DateofBirth`, `Gender`, `Category`, `Address`, `CountryID`,`StateID`, `CityID`, `Pincode`, `Email`, `MobileNo`, `Password`) VALUES (NULL, '$FirstName', '$MiddleName', '$LastName', '$ProfilePicUrl','$ResumeUrl', '$UniverID', '$InstID', '$CourseID', '$EnrNo', '$EnrolledYear', '$DateofBirth', '$Gender', '$Category', '$Address','$CountryID', '$StateID', '$CityID', '$Pincode', '$Email', '$MobileNo', '$Password');";
				mysqli_query($conn, $query);
			}
			fclose($handle);
			echo "<script>alert('Done...Imported Successfully');</script>";
			echo '<script>window.location.href = "list_all_users.php";</script>';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Import Users</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <style type="text/css">
      	<style type="text/css">
	@import "bourbon";

body {
	background: #eee !important;
}

.wrapper {
	margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}



	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}



}

</style>
      </style>
</head>
<body>
<?php include 'include/nav.php';?>
 <div class="wrapper">
    <form class="form-signin" method="post" enctype="multipart/form-data">
      <h2 class="form-signin-heading">Import <span style="color:red;">Users</span></h2>
      <hr>
      <label>Select CSV File:</label>

      <br>
      <input type="file" class="form-control" name="file" required />
      <br>
      <input class="btn btn-lg btn-danger btn-block" type="submit" name="submit" value="Import">

    </form>
  </div>
</body>
</html>