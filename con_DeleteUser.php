<?php
include 'include/DBConfig.php';
$UserID = $_GET['UserID'];
$sqlgetImg = "select ProfilePicUrl,ResumeUrl from users where UserID='$UserID'";
$result = $conn->query($sqlgetImg);
$row = $result->fetch_assoc();
unlink("images/" . $row['ProfilePicUrl']);
unlink("resumes/" . $row['ResumeUrl']);
$sql = "DELETE FROM users WHERE UserID=$UserID";

if ($conn->query($sql) === TRUE) {
	header("Location: list_all_users.php");
}
?>