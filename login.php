<?php session_start();
$pname = "login";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

	.checkbox {
	  font-weight: normal;
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

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}

</style>

</head>
<body>
<?php include 'include/nav.php';?>
  <div class="wrapper">
    <form class="form-signin" method="post" action="con_Login.php">
      <h2 class="form-signin-heading">Please <span style="color:red;">Login</span></h2>
      <hr>
      <input type="text" class="form-control" name="Email" placeholder="Email Address" required=""autofocus="" />
      <br>
      <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>
      <br>
      <button class="btn btn-lg btn-danger btn-block" type="submit" name="btnSubmit">Login</button>
      <br>

      <?php if (isset($_SESSION['Err'])) {
	?>
	 <center>
      	<div class="alert alert-danger" id="success-alert">
  		<span align="center">Invalid Login Credentials</span>
		</div>
      </center>
      	<?php

	unset($_SESSION['Err']);
}?>
      <p align="center"></p>
      <p align="center">Don't have Account? <a href="register.php"><span style="color:red;">Create New</span></a></p>
    </form>
  </div>
  <script type="text/javascript">
  	$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});</script>
</body>
</html>