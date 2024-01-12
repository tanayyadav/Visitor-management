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
  <title>Visitor Form</title>
  <meta charset="utf-8">
   <meta http-equiv=“X-UA-Compatible” content=“IE=edge”>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link href="css/style.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/date.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- This function is for the Dynamic list of the Bureau and the concerned officer-->
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
	<li><a href="exists_visitor.php">Existing Visitor</a></li>
      <li class="active"><a href="index.php">New Visitor</a></li>
      <li><a href="report.php">Search</a></li>
         </ul>
  </div>
</nav>
</div>

<div class="container" style="padding-top:30px">

 <div class="row">
 <div class="col-md-4">
 
    <div class="panel panel-primary">
      <div class="panel-heading"><center><strong style="color:black">Image</strong></center></div>
      <div class="panel-body"></div>
	  <!--
	Ideally these elements aren't created until it's confirmed that the 
	client supports video/camera, but for the sake of illustrating the 
	elements involved, they are created with markup (not JavaScript)
-->
<center id>
       <video id="video" width="320" height="222" autoplay></video><br><p>
	   <button id="snap" class="btn btn-primary">Capture</button><br><p>
       <canvas id="canvas" width="320" height="222" name="image"></canvas>
        <script type="text/javascript">
		
		
		
		// Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!

if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.src = window.URL.createObjectURL(stream);
        video.play();
    });
}



var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

// Trigger photo take

document.getElementById("snap").addEventListener("click", function () {
	context.drawImage(video, 10, 0, 300, 222);
});
		</script>
		<form method="post" accept-charset="utf-8" name="form1">
            <input name="hidden_data" id='hidden_data' type="hidden"/>
            </form>
 
        <script>
            function uploadEx() {
                var canvas = document.getElementById("canvas");
                var dataURL = canvas.toDataURL("image/png");
                document.getElementById('hidden_data').value = dataURL;
                var fd = new FormData(document.forms["form1"]);
 
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'pic_upload.php', true);
 
                xhr.upload.onprogress = function(e) {
                    if (e.lengthComputable) {
                        var percentComplete = (e.loaded / e.total) * 100;
                        console.log(percentComplete + '% uploaded');
                       alert('Image Upload Successfully'); 
                    }
                };
 
                xhr.onload = function() {
 
                };
                xhr.send(fd);
            };
        </script>
  
	</center>  
	  </div>
	  </div> 
 
 <!--<form action="visitor_detail.php" method="post">-->
 <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading"><center><strong style="color:black">Visitor Details</strong></center></div>
      <div class="panel-body"></div>
      
	  <div style="padding:10px">
	  <div class="form-group">
	  <form method="POST"  action="visitor_detail.php">
	  
	  
           <label class="control-label padding-left" for="fname">NAME:</label>
		   <div class="row">
		   <div class="col-md-6">
             <input type="text" class="form-control" name="fname" placeholder="First Name" required />
			 </div>
			 <div class="col-md-6">
             <input type="text" class="form-control" name="lname" placeholder="Last Name"/><p>
			 </div>
			 </div>
			<div class="form-group">
           <label class="control-label padding-left" for="phonenum">PHONE:</label>
                  <input type="tel" class="form-control" name="phone" placeholder="Mobile Number" pattern="^\d{10}$" required >
				  <p>
                      
			<div class="form-group">
              <label class="control-label padding-left" for="address">ADDRESS:</label>    
              <input type="text" class="form-control" name="address" placeholder="Address" required />
                <p>
                
			<div class="form-group">  
           <label class="control-label padding-left" for="email">EMAIL:</label>
            <input type="email" class="form-control" pattern="[^ @]*@[^ @]*" name="email" placeholder="Enter Email-ID"/><p>
              

              <div class="form-group">
              <label class="control-label padding-left" for="designation">DESIGNATION:</label>    
              <input type="text" class="form-control" name="designation" placeholder="Designation"/>
                <p>			  
			         
        <div class="form-group">  
          <label class="control-label padding-left" for="proof">ID PROOF:</label>
       <select class="form-control" name="id_name" required >
        <option>NOT AVAILABLE</option>
        <option>AADHAR</option>
        <option>DRIVING LICENSE</option>
        <option>PAN CARD</option>
        <option>PASSPORT</option>
        <option>DRIVING LICENSE</option>
        <option>VOTER ID</option>
      </select>
            <p>
                <div class="form-group">
              <label class="control-label padding-left" for="ID-details">ID details</label>    
              <input type="text" class="form-control" name="id_number" placeholder="Enter ID Details" required />
			  
               
            </div> </div>
                </div>
				</div>
                </div>
          </div>
          </div>
          </div>       
       </div>
    </div>
     
     <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading"><center><strong style="color:black">To Meet</strong></center></div>
      <div class="panel-body"></div>
    
	  <div style="padding:10px">
	  <div class="form-group">
           <label class="control-label padding-left">VISIT TYPE:</label>
		   
		   <div class="form-group">
          
          <label class="radio-inline">
      <input type="radio" name="optradio" value="OFFICIAL" checked>OFFICIAL
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="PERSONAL">PERSONAL
    </label><p>
               
               
               
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
        </div><p>
                   
           <div class="form-group">
          <label class="control-label padding-left" for="purpose">PURPOSE:</label>
              <input type="text" class="form-control" name="purpose" placeholder="Enter Purpose Of Visiting" required /><p>
          <div class="form-group">
           <label class="control-label padding-left" for="AV">ADDITIONAL VISITORS:</label>
                  <input type="text" class="form-control" name="AV" placeholder="Details of Additional visitors" required /><p>
				  
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
			  <br>
			  <br>

			 

			  
			  
<p style="color:red"><i>Please Check All Information Carefully</i></p>
	 
          
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
	
	<div class="control-label padding-center">
	<center>   <input type="button"  onclick="uploadEx()" class="btn btn-primary" value="Upload" />&nbsp&nbsp<button id="submit" class="btn btn-primary">Submit</button></center>
    </div>
	</form>
    </div>                  

	
</body>
</html>