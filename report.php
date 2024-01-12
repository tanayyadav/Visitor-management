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
       <div class="container-fluid" >
      <div class="panel-group">
      <center>
    <div class="col-md-3">
	<div class="panel panel-primary">
        <div class="panel-heading "><strong style="color:black">By Phone no:</strong></div>
      <div class="panel-body">
          <form method="POST" action="search_phone.php">
          <input type="text" name="search1"/>
             <br><br><br>
              <button type="submit" class="btn btn-primary">Search</button><br><br><p>
          </form>
      </div>
    </div>
	</div>
          <div class="col-md-1"></div>
<div class="col-md-3">
	<div class="panel panel-primary">
         <div class="panel-heading "><strong style="color:black">By Bureau:</strong></div>
      <div class="panel-body">
          <form ><select class="form-control"  name="bureau" >
        <option selected disabled hidden value="000">Please Select</option>
        <option value="00" >Chairman Secretariat</option>
        <option value="01"> Vice Chairman Secretariat</option>
        <option value="02">MS Secretariat</option>
        <option value="03">APPROVAL BUREAU</option>
        <option value="04">E-Governance CELL</option>
        <option value="05">CMAT & GPAT CELL</option>
        <option value="06">ADMINISTRATION BUREAU</option>
        <option value="07">ADMINISTRATION BUREAU-I-PERSONAL SECTION </option>
        <option value="08">ADMINISTRATION BUREAU-II-ESTABLISHMENT SECTION </option>
        <option value="09">ADMINISTRATION BUREAU-III-GENERAL ADMIN </option>
        <option value="10">ADMINISTRATION BUREAU-IV-HINDI CELL </option>
        <option value="11">Parliament Cell</option>
        <option value="12">FINANCE BUREAU</option> 
        <option value="13">Internal Audit Cell</option>
        <option value="14">Grievance Redressal Cell</option>
        <option value="15">Vigilance Cell</option>
        <option value="16">Legal Cell</option>
        <option value="17">Skill Development Cell</option>
        <option value="18">SWAYAM</option>
        <option value="19">RIFD</option>
        <option value="20">Prime Minister's Special Scholarship Scheme (PMSSS)</option>
        <option value="21">Direct Benifit Transfer(DBT) Cell</option>
        <option value="22">POLICY & ACADEMIC PLANNING BUREAU</option>
        <option value="23">Estate Management Cell</option>
        <option value="24">RTI Cell</option>
        <option value="25">Newsletter</option>
        <option value="26">Library</option>
           

		</select>
          <br><br>
              <button type="submit" class="btn btn-primary" name="search2" onclick="#">Search</button><br><br>
          </form>
      </div>
    </div>
	</div>
          <div class="col-md-1"></div>
<div class="col-md-3">
	<div class="panel panel-primary">
        <div class="panel-heading"><strong style="color:black">By Dates</strong></div>
      <div class="panel-body"><form >FROM:  &nbsp <input type="date" name="search3" id="search3" /> <br><br> &nbsp  &nbsp TO:&nbsp &nbsp <input type="date" name="search4" id="search3" />
          <br><br>
              <button type="submit" class="btn btn-primary" name="search3" onclick="#">Search</button>
                       </form>
          </div>
    </div>
          </center>
           </div>
		   </div>
        </div>
    </body>
</html>