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
if(!isset($_SESSION['time'])&&!isset($_SESSION['phone']))
                       {
	echo "<script>alert('Sorry Record would not print');
         window.location='exists_visitor.php';
			              exit();
			              </script>";
                      }
else
{
	include("mysql/connection.php");
	$time=$_SESSION['time'];
	$phone=$_SESSION['phone'];
	
	
	
	$sql ="select * from visitor_details where phone='$phone'";
	$sql1="select * from re_visitors where time='$time'";
	
	
	$result=mysqli_query($conn,$sql);
	$result1=mysqli_query($conn,$sql1);
	 $pic = mysqli_fetch_array($result);
	 $pic1 = mysqli_fetch_array($result1);
	 
	 
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
<td colspan ='2'>".$pic1['bureau']." ".$pic1['authority/officer']."</td>

</tr>

<tr>
<td colspan ='1'>Entry Date&Time:</td>
<td colspan ='2'>".$pic1['time']."</td><td colspan ='3' rowspan='2' ><br>Bureau/Cell.........................Sign...................</td>
</tr>

<tr>
<td colspan ='1'>Purpose:</td>
<td colspan ='2'>".$pic1['purpose']."</td>
</tr>
<tr>
<td colspan='3'><br><h4>Sign of Receptionist :</h4><br></td><td colspan='3'><br><h4>Sign of Visitor :</h4></td>
</tr>
</table>
";
unset($_SESSION['phone']);
unset($_SESSION['time']);
$mpdf->writeHTML($html);
$mpdf->Output("test.pdf","I");

                        }
?>
 </body>
	 </html>