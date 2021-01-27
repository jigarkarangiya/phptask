<?php
include 'include/DBConfig.php';
$FirstName = $_POST['FirstName'];
$MiddleName = $_POST['MiddleName'];
$LastName = $_POST['LastName'];
//file upload start
$ProfilePicUrl = $_FILES['ProfilePicUrl']['name'];
$time = date("Y-m-d H-i-s");
$filename = $time . $ProfilePicUrl;
$tmpname = $_FILES['ProfilePicUrl']['tmp_name'];
move_uploaded_file($tmpname, "images/" . $filename);
//file upload end
//file upload for resume
$ResumeUrl = $_FILES['ResumeUrl']['name'];
$time = date("Y-m-d H-i-s");
$resumename = $time . $ResumeUrl;
$tmpname2 = $_FILES['ResumeUrl']['tmp_name'];
move_uploaded_file($tmpname2, "resumes/" . $resumename);
//file upload for resume end
$UniverID = $_POST['UniverID'];
$InstID = $_POST['InstID'];
$CourseID = $_POST['CourseID'];
$EnrNo = $_POST['EnrNo'];
$EnrolledYear = $_POST['EnrolledYear'];
$DateofBirth = $_POST['DateofBirth'];
$Gender = $_POST['Gender'];
$Category = $_POST['Category'];
$Address = $_POST['Address'];
$CountryID = $_POST['CountryID'];
$StateID = $_POST['StateID'];
$CityID = $_POST['CityID'];
$Pincode = $_POST['Pincode'];
$Email = $_POST['Email'];
$MobileNo = $_POST['MobileNo'];
$Password = $_POST['Password'];
$sql = "INSERT INTO `users` (`UserID`, `FirstName`, `MiddleName`, `LastName`, `ProfilePicUrl`,`ResumeUrl`, `UniverID`, `InstID`, `CourseID`, `EnrNo`, `EnrolledYear`, `DateofBirth`, `Gender`, `Category`, `Address`, `CountryID`,`StateID`, `CityID`, `Pincode`, `Email`, `MobileNo`, `Password`) VALUES (NULL, '$FirstName', '$MiddleName', '$LastName', '$filename','$resumename', '$UniverID', '$InstID', '$CourseID', '$EnrNo', '$EnrolledYear', '$DateofBirth', '$Gender', '$Category', '$Address','$CountryID', '$StateID', '$CityID', '$Pincode', '$Email', '$MobileNo', '$Password');";

if ($conn->query($sql) === TRUE) {

	echo "<script>
			alert('Registred Successfully..Please Login');
			window.location.href='login.php';
		</script>";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
?>