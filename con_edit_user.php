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
$StateID = $_POST['StateID'];
$CityID = $_POST['CityID'];
$CountryID = $_POST['CountryID'];
$Pincode = $_POST['Pincode'];
$Email = $_POST['Email'];
$MobileNo = $_POST['MobileNo'];
$Password = $_POST['Password'];
$UserID = $_POST['UserID'];

$sql = "UPDATE `users` SET `FirstName` = '$FirstName', `MiddleName` = '$MiddleName', `LastName` = '$LastName', `ProfilePicUrl` = '$filename',`ResumeUrl`='$resumename', `UniverID` = '$UniverID', `InstID` = '$InstID', `CourseID` = '$CourseID', `EnrNo` = '$EnrNo', `EnrolledYear` = '$EnrolledYear', `DateofBirth` = '$DateofBirth', `Gender` = '$Gender', `Category` = '$Category', `Address` = '$Address', `CountryID`='$CountryID', `StateID` = '$StateID', `CityID` = '$CityID', `Pincode` = '$Pincode', `Email` = '$Email', `MobileNo` = '$MobileNo', `Password` = '$Password' WHERE `UserID` = '$UserID'";

if ($conn->query($sql) === TRUE) {
	header("Location: list_all_users.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
?>