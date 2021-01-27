<?php
include 'include/DBConfig.php';
$FirstName = $_POST['FirstName'];
$MiddleName = $_POST['MiddleName'];
$LastName = $_POST['LastName'];
$ProfilePicUrl = $_FILES['ProfilePicUrl']['name'];
//This is the directory where images will be saved
$target = "images/";
$target = $target . time() . basename($_FILES['ProfilePicUrl']['name']);

//This gets all the other information from the form
$Filename = basename($_FILES['ProfilePicUrl']['name']);

//Writes the Filename to the server
if (move_uploaded_file($_FILES['ProfilePicUrl']['tmp_name'], $target)) {
} else {
	//Gives and error if its not
	echo "Sorry, there was a problem uploading your file.";
}
$UniverID = $_POST['UniverID'];
$InstID = $_POST['InstID'];
$CourseID = $_POST['CourseID'];
$EnrNo = $_POST['EnrNo'];
$EnrolledYear = $_POST['EnrolledYear'];
$DateofBirth = $_POST['DateofBirth'];
$Gender = $_POST['Gender'];
$Category = $_POST['Category'];
$Address = $_POST['Address'];
$State = $_POST['State'];
$City = $_POST['City'];
$Pincode = $_POST['Pincode'];
$Email = $_POST['Email'];
$MobileNo = $_POST['MobileNo'];
$Password = $_POST['Password'];
$sql = "INSERT INTO `users` (`UserID`, `FirstName`, `MiddleName`, `LastName`, `ProfilePicUrl`, `UniverID`, `InstID`, `CourseID`, `EnrNo`, `EnrolledYear`, `DateofBirth`, `Gender`, `Category`, `Address`, `State`, `City`, `Pincode`, `Email`, `MobileNo`, `Password`) VALUES (NULL, '$FirstName', '$MiddleName', '$LastName', '$ProfilePicUrl', '$UniverID', '$InstID', '$CourseID', '$EnrNo', '$EnrolledYear', '$DateofBirth', '$Gender', '$Category', '$Address', '$State', '$City ', '$Pincode', '$Email', '$MobileNo', '$Password');";

if ($conn->query($sql) === TRUE) {
	header("Location: list_all_users.php");
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
?>