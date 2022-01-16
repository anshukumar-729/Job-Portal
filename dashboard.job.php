<?php
session_start(); 
if (isset($_SESSION['email'])) {
 
} else {
  echo "<script>
        
        window.location.href='/inmoviduInternship/signIn.php';
        </script>";
}
require 'connection.php';
require 'nav.php';
$email=$_GET["email"];
$companynameError="";
$positionError="";
$jobdescError="";
$skillreqError="";
$ctcError="";
$openingError="";

if ($_SERVER['REQUEST_METHOD']=='POST'){
  $companyname=$_POST['companyname'];
  $position=$_POST['position'];
  $jobdesc=$_POST['jobdesc'];
  $skillreq=$_POST['skillreq'];
  $ctc=$_POST['ctc'];
  $opening=$_POST['opening'];
  if(!$companyname){
    $companynameError="*Feild required!!";
  }
  elseif(!$position){
    $positionError="*Feild required!!";
  }
  elseif(!$jobdesc){
    $jobdescError="*Feild required!!";
  }
  elseif(!$skillreq){
    $skillreqError="*Feild required!!";
  }
  elseif(!$ctc){
    $ctcError="*Feild required!!";
  }
  elseif(!$opening){
    $openingError="*Feild required!!";
  }

  else{
    

    $sql = " INSERT INTO `$email` (`companyname`, `position`, `jobdesc`, `skillreq`, `ctc`, `opening`) VALUES ('$companyname', '$position', '$jobdesc', '$skillreq', '$ctc', '$opening')";
    $result = mysqli_query($conn,$sql);
   
    
  }

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Job Portal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <script src="https://kit.fontawesome.com/fa7b7cc318.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
	<link rel="stylesheet" href="style.css">
  <style>
    span{
      color:red;
    }
    .heading{
      background-image: url('img3.jpg');
    }
    #sidebar{
      background-image: url('img3.jpg') !important;
      color:black !important;
    }
    
#sidebar ul li a:hover{
	color: white !important;
	background: #2C3539 !important;
}

.btn{
background-color:#2C3539 !important;
}
.col-12{
  width:100% !important;
}
  </style>
</head>
<body>

<div class="heading col-12 p-3 mb-1 text-left d-flex">
<button type="button" id="sidebarCollapse" class="btn text-white pt-2">


<i class="fas fa-align-left"></i>

  			
  			
  		</button>	
<h3 class="text-black pt-1 col-8 col-md-10">Admin Dashboard</h3>
<a type="button" href="signIn.php" class="btn text-white pt-2 ml-5">
<i class="fas fa-sign-out-alt"></i>
  			
</a>	
</div>
<div class="wrapper">
	
 <nav  id="sidebar">
 	
 	 
 	 <ul class="lisst-unstyled components">

 	 	
 	 	
 	 	<li>
 	 		<a href="/inmoviduInternship/dashboard.job.php?email=<?php echo $email ?>">Job</a>
 	 	</li>
		  <li>
 	 				<a href="/inmoviduInternship/dashboard.application.php?email=<?php echo $email ?>">Candidates Applied</a>
 	 			</li>

         <li>
 	 				<a href="#">Contact</a>
 	 			</li>
         <li>
 	 				<a href="#">About</a>
 	 			</li>
 	 
 	 	 	 

 	 </ul>
 </nav>

<?php 
require 'job.php';
?>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
 if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>


</body>
</html>