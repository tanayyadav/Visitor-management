<?php
session_start();
if(!isset($_SESSION['uname']))
{
	echo "<script>
         window.location='../index.php';
			              exit();
			              </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php	
	include("header/header.php");
?>
<div style="padding-top:30px;">	
<nav class="navbar navbar-default active navbar hover" >
  
  <div class= "container-fluid">
   
    <ul class="nav navbar-nav">
	<li class="active"><a href="dashboard.php">Home</a></li>
	<li><a href="exists_visitor.php">Existing Visitor</a></li>
      <li><a href="index.php">New Visitor</a></li>
      <li><a href="report.php">Search</a></li>
         </ul>
  </div>
  <div class= "container-fluid">
  
</nav>
</div>
</body>
</html>
