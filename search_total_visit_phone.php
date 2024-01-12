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
<!DOCTYPE Html>
<html>
<head>
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
	<li><a href="exists_visitor.php">Existing Visitor</a></li>
      <li><a href="index.php">New Visitor</a></li>
      <li class="active"><a href="report.php">Search</a></li>
         </ul>
  </div>
</nav>
</div>
</body>
</html>
<?php
include("mysql/connection.php");
$number=mysqli_real_escape_string($conn,$_GET['phone']);
	
	$sql="select * from re_visitors where phone='$number'";
	 $retval=mysqli_query($conn,$sql);
	if(mysqli_num_rows($retval)==0)
{
	
    echo "<script>alert('Record does not Exist')</script>";	
}
else
{
	$ret=mysqli_fetch_assoc($retval);
	?>
	<table class="table">
    <thead>
      <tr>
	    <th>Mobile No.</th>
        <th>Visit Type</th>
        <th>Authority/Officer</th>
		<th>Purpose</th>
        <th>Extra Member</th>
        <th>Date&Time</th>
		
      </tr>
    </thead>
    <tbody>
      <tr>
	    <td><?php echo $ret['phone'];?> </td>
        <td><?php echo $ret['visit_type'];?> </td>
        <td><?php echo $ret['authority/officer'];?></td>
		<td><?php echo $ret['purpose'];?></td>
		<td><?php echo $ret['additional_member'];?></td>
        <td><?php echo $ret['date'];?></td>
		
		
        
      </tr>
    </tbody>
  </table>
  <?php
}



?>