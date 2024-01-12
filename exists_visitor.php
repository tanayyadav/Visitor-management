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
	<li><a href="dashboard.php">Home</a></li>
	<li  class="active"><a href="exists_visitor.php">Existing Visitor</a></li>
      <li><a href="index.php">New Visitor</a></li>
      <li><a href="report.php">Search</a></li>
         </ul>
  </div>
  
</nav>
</div>
 <div class="container-fluid" >
      <div class="panel-group">
	   <div class="col-md-4"></div>
<center>
 <div class="col-md-4">
	<div class="panel panel-primary">
        <div class="panel-heading "><strong style="color:black">Phone no:</strong></div>
      <div class="panel-body">
          <form method="POST" action="exists_visitor.php">
          <input type="text" name="phone" id="search2" />
             <br><br><br>
              <button type="submit" class="btn btn-primary" name="submit" onclick="#">Search</button><br><br><p>
          </form>
      </div>
    </div>
	</div>
	</center>
	<div class="col-md-4"></div>
	 </div>
        </div>
</body>

<?php
include("mysql/connection.php");
if(isset($_POST['submit']))
{
	$number=mysqli_real_escape_string($conn,$_POST['phone']);
	
	$sql="select * from visitor_details where phone='$number'";
	 $retval=mysqli_query($conn,$sql);
	if(mysqli_num_rows($retval)==0)
{
	
    echo "<script>alert('Record does not Exist')</script>";	
}
else
{
	$ret=mysqli_fetch_array($retval);
	?>
	<table class="table">
    <thead>
      <tr>
        <th>Visitor Id</th>
        <th>Name</th>
        <th>Email</th>
		<th>Organisation</th>
        <th>Designation</th>
        <th>Id Name</th>
		<th>Id Number</th>
        <th>Visit Type</th>
        <th>Authority/Officer</th>
		<th>Purpose</th>
        <th>Extra Member</th>
        <th>Date&Time</th>
		<th>Photograph</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $ret['id'];?> </td>
        <td><a href="re_entry.php"><?php echo $ret['fname']." ".$ret['lname'];?></a></td>
        <td><?php echo $ret['email'];?></td>
		<td><?php echo $ret['address'];?> </td>
        <td><?php echo $ret['designation'];?> </td>
        <td><?php echo $ret['id_name'];?> </td>
		<td><?php echo $ret['id_number'];?> </td>
        <td><?php echo $ret['visit_type'];?> </td>
        <td><?php echo $ret['authority/officer'];?></td>
		<td><?php echo $ret['purpose'];?></td>
		<td><?php echo $ret['additional_member'];?></td>
        <td><?php echo $ret['date'];?></td>
		<td><img src="<?php echo $ret['image'];?>" width="80" height="60"></td>
		
        
      </tr>
    </tbody>
  </table>
  <?php
  $_SESSION['phone']=$ret['phone'];
}
}
?>
	 

	



