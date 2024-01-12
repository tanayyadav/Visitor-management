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
  <title>Re Visitor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
		$(function() {
			$("#text-one").change(function() {
				$("#text-two").load("textdata/" + $(this).val() + ".txt");
			});
			});
    </script>
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

	  <form method="POST"  action="re_entry.php">
     
     <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading"><center><strong style="color:black">To Meet</strong></center></div>
	  <div style="padding:10px">
	  <div class="form-group">
           <label class="control-label padding-left">VISIT TYPE:</label>
		   
		   <div class="form-group">
          
          <label class="radio-inline">
      <input type="radio" name="optradio" value="OFFICIAL" checked>OFFICIAL
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="PERSONAL">PERSONAL
    </label>
               
               
               
    <div class="form-group">     
        <label class="control-label padding-left" for="bureau">BUREAU:</label>      
        <select class="form-control" id="text-one" name="bureau" required>
        <option selected disabled hidden value="000">Please Select</option>
        <option value="29" >Chairman Secretariat</option>
        <option value="01"> Vice Chairman Secretariat</option>
        <option value="02">MS Secretariat</option>
        <option value="03">APPROVAL BUREAU</option>
        <option value="04">E-Governance CELL</option>
        <option value="05">CMAT & GPAT CELL</option>
        <option value="06">ADMINISTRATION BUREAU</option>
        <option value="07">ADMINISTRATION BUREAU-I-PERSONAL SECTION </option>
        <option value="08">ADMINISTRATION BUREAU-II-ESTABLISHMENT SECTION </option>
        <option value="09">ADMINISTRATION BUREAU-III-GENERAL ADMIN </option>
        <option value="101">ADMINISTRATION BUREAU-IV-HINDI CELL </option>
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
        </div>       
               
               <div class="form-group">
           <label class="control-label padding-left" for="officer">AUTHORITY/OFFICER:</label>  
           <div class="row">
    <!--    <div class="col-md-1"></div>-->
        <div class="col-md-10">
        <select class="form-control" id="text-two" name="text-two" required>
            <option selected disabled hidden>Please choose from above</option>
		</select>              
        </div> 
               
        <div class="col-md-1"></div>
        </div>
                   
           <div class="form-group">
          <label class="control-label padding-left" for="purpose">PURPOSE:</label>
              <input type="text" class="form-control" name="purpose" placeholder="Enter Purpose Of Visiting" required />
          <div class="form-group">
           <label class="control-label padding-left" for="AV">ADDITIONAL VISITORS:</label>
                  <input type="text" class="form-control" name="AV" placeholder="Details of Additional visitors" required />
				  
              <div class="form-group">
           <!--<label class="control-label padding-left" for="gen">VISIT DATE:</label>
                  <!--
    <input type="date" class="form-control" name="bday" max="3000-12-31" 
        min="1000-01-01" class="form-control">
                  
               -->   
                  
                 	  
              <div class="form-group">
			  
            <div class="form-group">
                       <label class="control-label padding-left" for="fname">DATE & TIME:</label>
		   <div class="row">
		   <div class="col-md-6">
             <input type="datetime" class="form-control" readonly name="timeopen" value="<?php
                  date_default_timezone_set("Asia/Kolkata");
                  print date("y/m/d G:i:s", time());
                  ?>"
                    />
			 </div>
               
			  </div>
       </div>
	   </div>
	   </div>
	   </div>
	   </div>
	   </div>
	   </div>
	   </div>
	   

         
    </div>
	</div>
    </div>
	
	<div class="col-md-4"></div>
	</div>
</div>	
	<center style="padding-top:20px;"><button name="submit" id="submit" class="btn btn-primary">Submit</button></center>
	</form>
    
<?php
if(!isset($_SESSION['phone']))
                      {
	echo "<script>alert('Please Select Visitor Re-again');
         window.location='exists_visitor.php';
			              exit();
			              </script>";
                      }
					  else{
include("mysql/connection.php");
$num=$_SESSION['phone'];
if(isset($_POST['submit']))
	
{
	$number=mysqli_real_escape_string($conn,$num);
	$optradio=mysqli_real_escape_string($conn,$_POST['optradio']);
    $bureau  =mysqli_real_escape_string($conn,$_POST['bureau']);
    $officer  =mysqli_real_escape_string($conn,$_POST['text-two']);
    $purpose  =mysqli_real_escape_string($conn,$_POST['purpose']);
    $extra_visitor  =mysqli_real_escape_string($conn,$_POST['AV']);
	$date_time  =mysqli_real_escape_string($conn,$_POST['timeopen']);
	
	$sql="INSERT INTO re_visitors(`phone`, `visit_type`, `bureau`, `authority/officer`, `purpose`, `additional_member`,`time`) VALUES ('$number','$optradio', '$bureau','$officer','$purpose','$extra_visitor','$date_time')";
	
	 $result=mysqli_query($conn,$sql);
				 
				 if($result==1)
                         {
							$_SESSION['time']= $date_time;
							 
                      echo  "<script>alert('Record Submitted');
                          window.location='re_print.php';
			              exit();
			              </script>";
											 
						 }
						 else
						 {
                        echo  "<script>alert('Record is not Submitted');
                          window.location='exists_visitor.php';
			              exit();
			              </script>";
						}
						
}
					  }					
?>


</body>

</html>