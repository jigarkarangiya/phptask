<?php
session_start();
$pname = "list_all_users";
if (!isset($_SESSION['UserID'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
   <head>
      <title>All Users</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

      <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

      <style type="text/css">
         .custab{
         border: 1px solid #ccc;
         padding: 5px;
         margin: 5% 0;
         box-shadow: 3px 3px 2px red;
         transition: 0.5s;
         }
         .custab:hover{
         box-shadow: 3px 3px 0px transparent;
         transition: 0.5s;
         }
      </style>
   </head>
   <body>
      <?php include 'include/nav.php';?>
      <div class="container">
         <div class="row col-md-12 custyle">

            <hr>
            <div class="container">
              <div class="table-responsive">
              <table class="table table-striped custab" id="userstable" class="display" style="width:100%">
               <thead>
                  <tr>
                     <th>Sr.</th>
                     <th>Photo</th>
                     <th>Full Name</th>
                     <th>Email</th>
                     <th>city</th>
                     <th class="text-center">Action</th>
                  </tr>
               </thead>
                  <tbody>
               <?php
include 'include/DBConfig.php';
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$count = 1;
	while ($row = $result->fetch_assoc()) {

		?>
               <tr>
                  <td><?php echo $count; ?></td>
                  <td>
                    <a href="images/<?php echo $row["ProfilePicUrl"]; ?>" class="fancybox">
                      <img src="images/<?php echo $row["ProfilePicUrl"]; ?>" width="50" height="50">
                    </a>

                  </td>
                  <td><?php echo $row["FirstName"] . " " . $row["MiddleName"] . " " . $row["LastName"]; ?></td>
                  <td><a href="mailto:<?php echo $row["Email"]; ?>"><?php echo $row["Email"]; ?></a></td>
                  <td><?php $CityID = $row['CityID'];
		$sqlCity = "SELECT * FROM `city` WHERE `CityID`=$CityID";
		$resultCity = $conn->query($sqlCity);
		$City = $resultCity->fetch_assoc();
		echo $City['CityName'];?></td>
                  <td class="text-center"><a class='btn btn-success btn-xs' href="user_details.php?UserID=<?php echo $row['UserID']; ?>"><i class="fa fa-eye" aria-hidden="true"></i> View</a> <a class='btn btn-info btn-xs' href="edit_user.php?UserID=<?php echo $row['UserID']; ?>"><i class="fa fa-edit"></i> Edit</a> <a href="con_DeleteUser.php?UserID=<?php echo $row['UserID']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a></td>
               </tr>


               <?php
$count++;
	}
}
?>
             </tbody>
             <tfoot>
              <tr>
                     <th>ID</th>
                     <th>Photo</th>
                     <th>Full Name</th>
                     <th>Email</th>
                     <th>city</th>
                     <th class="text-center">Action</th>
                  </tr>
             </tfoot>
            </table>
            </div>
            </div>

         </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
    $('#userstable').DataTable();
} );
      </script>
      <script type="text/javascript">
        $(".fancybox").fancybox();
      </script>

   </body>
</html>