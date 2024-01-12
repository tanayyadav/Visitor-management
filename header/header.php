
<div class="container padTopBtm10 no-white no-pad">
 <div class="container">
 <div class="navbar-header"> 
 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
 <span class="icon-bar"></span> <span class="icon-bar"></span> 
 <span class="icon-bar"></span> </button> <a class="navbar-brand" href="index.html">
 <img src="image/logo.png"></img></a> 
</div> <div class="collapse navbar-collapse" id="myNavbar"> 
 <ul class="nav navbar-nav navbar-right">
 <?php 
 if (isset($_SESSION['uname'])) 
 { ?>
 
 <li><a href = "logout.php"><span class = "glyphicon glyphicon-log-in" style="padding-top:20px; color:#f37020"> Logout</span></a></li>
  <li><a href = ""><span class = "glyphicon glyphicon-user" style="padding-top:20px; color:#f37020"> Welcome: <?php echo $_SESSION['uname'];?></span></a></li> 

 <?php
} else 
{ ?> 

<li><span class="glyphicon glyphicon-user" style="padding-top:20px; color:#f37020"> Only For Receptionist</span></li> 
<?php } ?>
 </ul>
 </div>
 </div>
 </div>
