<?php
session_start();
$pname = "export";
if (!isset($_SESSION['UserID'])) {
	header("location: login.php");
}
include 'include/DBConfig.php';
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$time = date("Y-m-d_H-i-s");
	$filename = "exports/" . "users_" . $time . ".csv";

	$file = fopen("$filename", "w");
	$header = "a,b,c,d";
	fputcsv($file, $header);
	foreach ($result as $line) {
		fputcsv($file, $line);
	}

	echo "<script>alert('Data Exported successfully');</script>";
	fclose($file);
	echo '<script>window.location.href = "list_all_users.php";</script>';

} else {
	echo "<script>alert('Error Occured');</script>";
	echo '<script>window.location.href = "list_all_users.php";</script>';
}
$conn->close();
?>