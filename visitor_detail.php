

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>print details</title>
<script>

</script>
</head>

<body>
<?php
session_start();
if(!isset($_SESSION['pic']))
                      {
	echo "<script>alert('please upload image');
         window.location='index.php';
			              exit();
			              </script>";
					  }
     else{
include("mysql/connection.php");
$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$lname=mysqli_real_escape_string($conn,$_POST['lname']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$email  =mysqli_real_escape_string($conn,$_POST['email']);
$id_name  =mysqli_real_escape_string($conn,$_POST['id_name']);
$id_number  =mysqli_real_escape_string($conn,$_POST['id_number']);
$optradio=mysqli_real_escape_string($conn,$_POST['optradio']);
$bureau  =mysqli_real_escape_string($conn,$_POST['bureau']);
$officer  =mysqli_real_escape_string($conn,$_POST['text-two']);
$purpose  =mysqli_real_escape_string($conn,$_POST['purpose']);
$extra_visitor  =mysqli_real_escape_string($conn,$_POST['AV']);
$date_time  =mysqli_real_escape_string($conn,$_POST['timeopen']);
$designation  =mysqli_real_escape_string($conn,$_POST['designation']);
 //upload image to server
            ;


//save the location to database

             $escapedString = mysqli_real_escape_string($conn,$_SESSION['pic']);
			 if($bureau==null&&$officer==null)
			 {
		       echo "<script>alert('Please Select Bureaus And Authority/officer');
               window.location='index.php';
			   exit();
			   </script>";
			 }
			 else
			 {
				 
                 
				 
				 
				 $sql="INSERT INTO `visitor_details` (`id`, `fname`, `lname`, `phone`, `address`, `email`, `designation`, `id_name`, `id_number`, `visit_type`, `bureau`, `authority/officer`, `purpose`, `additional_member`, `time`, `image`) VALUES (NULL, '$fname', '$lname', '$phone', '$address', '$email','$designation', '$id_name', '$id_number', '$optradio', '$bureau', '$officer', '$purpose', '$extra_visitor', '$date_time', '$escapedString')";
				 $result=mysqli_query($conn,$sql);
				 
				 if($result==1)
                         { 
					   echo  "<script>alert('Record Submitted');
			              </script>";
                          
					    // create the query
			           $sql = "select * from visitor_details where time='$date_time'";
                 

         // the result of the query
          $result = mysqli_query($conn,$sql);




 
   // there should only be 1 result (if img_id = the primary index)
         $pic = mysqli_fetch_array($result);
		 

include_once "mpdf/mpdf.php";
$mpdf = new mPDF();
$mpdf->setAutoFont();

$html="<style>table, th, td {
    border: 1px solid black;
border-collapse: collapse;

}
   .floatedTable {
            float:left;
            width:100%;
        }
</style>


   <h3 style='padding-left:120px'>ALL INDIA COUNCIL FOR TECHNICAL EDUCATION</h3>

<h4 style='padding-left:150px'>Nelson Mandela Marg,Vasant Kunj,New Delhi-110070</h4>
<h3 style='padding-left:250px'>VISITOR'S GATE PASS</h3>

<table class='floatedTable'>

<tr>
<th colspan='3'>VISITOR DETAILS</th>
<th colspan='3'>PHOTOGRAPH</th>
</tr>


<tr>
<td colspan ='1'>Visitor Id</td>
<td colspan ='2'>".$pic['id']."</td>
<td colspan ='3' rowspan='2'><center><img src='".$pic['image']."' border=1 height=80 width=120 ></img></center></td>
</tr>

<tr>
<td colspan ='1'> Visitor Name</td>
<td colspan ='2'>".$pic['fname']." ".$pic['lname']."</td>
</tr>

<tr>
<td colspan ='1'> Mobile No.</td>
<td colspan ='2'>".$pic['phone']."</td><td colspan ='3' rowspan='2' ><br>Bureau/Cell.........................Sign...................</td>
</tr>


<tr>
<td colspan ='1'>Organisation:</td>
<td colspan ='2'>".$pic['address']."</td>
</tr>

<tr>
<td colspan ='1'>Designation:</td>
<td colspan ='2'>".$pic['designation']."</td>
<td colspan ='3' rowspan='2' ><br>Bureau/Cell.........................Sign...................</td>
</tr>

<tr>
<td colspan ='1'> To Meet:</td>
<td colspan ='2'>".$pic['bureau']." ".$pic['authority/officer']."</td>

</tr>

<tr>
<td colspan ='1'>Entry Date&Time:</td>
<td colspan ='2'>".$pic['time']."</td><td colspan ='3' rowspan='2' ><br>Bureau/Cell.........................Sign...................</td>
</tr>

<tr>
<td colspan ='1'>Purpose:</td>
<td colspan ='2'>".$pic['purpose']."</td>
</tr>
<tr>
<td colspan='3'><br><h4>Sign of Receptionist :</h4><br></td><td colspan='3'><br><h4>Sign of Visitor :</h4></td>
</tr>
</table>
";
unset($_SESSION['pic']);
$mpdf->writeHTML($html);
$mpdf->Output("test.pdf","I");

                        }
                 else
                         {
	                      echo "<script>alert('Please Fill Form Again');
                          window.location='index.php';
			              exit();
			              </script>";
	   
                         }
           
			 }
	 }
     ?>
	 </body>
	 </html>