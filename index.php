<?php session_start();
$pname = 'home';?>
<!DOCTYPE html>
<html>
   <head>
      <title>Home Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      </head>
   <body>
      <?php include 'include/nav.php';?>
      <br>
      <main role="main" class="container">
      <div class="jumbotron">
        <h1>Welcome to ABC Company</h1>
        <hr>
        <p class="lead">This is a Simple Homepage of ABC Company</p>
      </div>
    </main>
   </body>
</html>