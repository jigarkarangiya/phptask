<?php
include "include/DBConfig.php";
$StateID = $_POST["StateID"];
$resultCity = mysqli_query($conn, "SELECT * FROM city where StateID = $StateID");
?>
<option value="">Select City</option>
<?php
while ($rowCity = mysqli_fetch_array($resultCity)) {
	?>
<option value="<?php echo $rowCity["CityID"]; ?>"><?php echo $rowCity["CityName"]; ?></option>
<?php
}
?>