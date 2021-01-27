<?php
session_start();
require "include/DBConfig.php";

$Email = $_POST["Email"];
$Password = $_POST["Password"];

$sql = "SELECT * FROM users WHERE `Email` = '$Email' AND `Password` = '$Password';";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$UserID = $row["UserID"];
	$_SESSION['UserID'] = $UserID;
	header("Location: list_all_users.php");
} else {
	$_SESSION['Err'] = "Invalid Login Credentials";
	header("Location: login.php");}
?>