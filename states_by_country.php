<?php
include "include/DBConfig.php";
$CountryID = $_POST["CountryID"];
$resultStates = mysqli_query($conn, "SELECT * FROM states where CountryID = $CountryID");
?>
<option value="">Select State</option>
<?php
while ($rowStates = mysqli_fetch_array($resultStates)) {
	?>
<option value="<?php echo $rowStates["StateID"]; ?>"><?php echo $rowStates["StateName"]; ?></option>
<?php
}
?>