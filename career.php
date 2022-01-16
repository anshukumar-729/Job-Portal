<?php
require 'connection.php';
require 'nav.php';
$jobid=$_GET['jobid'];



?>
<script>
  
  function applyJOb(d){
    console.log(d);
    window.location.href='/inmoviduInternship/career.php?jobid='+d;}
 
  
</script>
<?php

$nameError="";
$positionError="";
$qualificationError="";
$yearpassoutError="";
if ($_SERVER['REQUEST_METHOD']=='POST'){

  $jobid=$_POST['jobid'];
  $name=$_POST['name'];
  $position=$_POST['position'];
  $qualification=$_POST['qualification'];
  $yearpassout=$_POST['yearpassout'];

  if (!$name){
    $nameError="*Feild Required!!";
   
    }  
  elseif(!$position){
    $positionError="*Feild Reuired!!";
  }
  elseif(!$qualification){
    $qualificationError="*Feild Reuired!!";
  }
  elseif(!$yearpassout){
    $yearpassoutError="*Feild Reuired!!";
  }
  elseif(strlen($yearpassout)>4){
    $yearpassoutError="*Invalid Year!!";
  }
  else {
    $sql = " INSERT INTO `applicants` (`name`, `position`, `jobid`, `qualification`, `yearpassout`) VALUES ('$name', '$position', '$jobid', '$qualification', '$yearpassout')";
    $result = mysqli_query($conn,$sql);
    echo "<script>
    alert('You applied for the job!!');
    window.location.href='/inmoviduInternship/career.php?jobid=0';
    </script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <style>
    span{
      color:red;
    }
    .careerImg{
      background-image: linear-gradient(180deg,  #2C3539,#2C3539);
      width:100%;
    }
    .imgText{
      margin-left:10px;
    }
    .btn-primary{
      background-color:#2C3539; !important
    }
    .card{
  background-image: url('img3.jpg');
    background-repeat: no-repeat;
    background-size:cover;
}
body{
  background-image:url('img2.jpg');
}
    </style>
</head>
<body>
 
    
        <!-- <img src="career.jpg" height="200px" width="100%" text="jdjfhfh">
       <div class="careerLabel" style="position:absolute; top:50px; left:110px">
           <h1 class="text-white display-3">Job portal</h1>
           <h5 class="text-white display-6">Best job available mathing your skill</h5>
       </div> -->
       <div class="card pb-2 "><div class="imgText"><h1 class="text-black display-4 ">Job portal</h1>
           <h5 class="text-black display-6">Best job available mathing your skill</h5>
  </div></div>
       
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
  
  <?php
  $sql = " SELECT * FROM registration ";
  $result = mysqli_query($conn,$sql);
  if ($result){
    $num=mysqli_num_rows($result);
    
    if($num!=0){
        while($row=mysqli_fetch_assoc($result)){
          
          $email=$row['email'];
          $sql2 = " SELECT * FROM `$email` ";
          $result2 = mysqli_query($conn,$sql2);
          if ($result2){
          while($row2=mysqli_fetch_assoc($result2)){
           
            $jobid=$row['sno'].'000'.$row2['sno'];
            ?>
            <div class="col mb-4">
    <div class="card m-3" style="width: 23rem; box-shadow:2px 2px 18px #2C3539">
      
      <div class="card-body">
      <div style=" margin-top:-10px "><i>job id: </i><?php echo $jobid ?></div>

        <h5 class="card-title text-center"><i>Position: </i><?php echo $row2['position'] ?></h5>
        <h5 class="card-text text-center "><i>Company Name: </i><?php echo $row2['companyname'] ?></h5>
        <p class="card-text"><i>Opening: </i><?php echo $row2['opening'] ?></p>
        <p class="card-text"><i>Skill Required: </i><?php echo $row2['skillreq'] ?></p>
        <p class="card-text"><i>CTC: </i><?php echo $row2['ctc'] ?></p>
        <button type="submit"  onclick="applyJOb(<?php echo $jobid ?>)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Apply Now
</button> 
    </div>
    </div>
  </div>

            <?php


          }}
          else{
            echo mysqli_error($conn);
          }
        }
    }
    else{
      $signInError="*Invalid email or password!!";
    }
  }
  else{
    echo "Not Found ".mysqli_error($conn);
  }
   
    
  ?>
  
  
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="card modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Apply for Jobs</h5>
        <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
      <label for="name" class="text-muted">Job id</label>
        <input type="text" name="jobid" value="<?php echo $_GET['jobid'] ?>" readonly>
  <div class="form-group mb-3">
  <div class="d-flex">
    <label for="name" class="text-muted">Name</label>
    <?php if ($nameError){
                        echo  "<span >$nameError</span> " ;
                      }
                     ?>
                     </div>
    <input type="text" name="name" class="form-control" id="name">
  </div>
  <div class="form-group mb-3">
  <div class="d-flex">
    <label for="position" class="text-muted">Applying For</label>
    <?php if ($positionError){
                        echo  "<span >$positionError</span> " ;
                      }
                     ?>
                     </div>
    <input type="text" name="position" class="form-control" id="position">
  </div>
  <div class="form-group mb-3">
  <div class="d-flex">
    <label for="qualification" class="text-muted">Qualification</label>
    <?php if ($qualificationError){
                        echo  "<span >$qualificationError</span> " ;
                      }
                     ?>
                     </div>
    <input type="text" name="qualification" class="form-control" id="qualification">
  </div>
  <div class="form-group mb-3">
  <div class="d-flex">
    <label for="yearPassout" class="text-muted">Year Passout</label>
    <?php if ($yearpassoutError){
                        echo  "<span >$yearpassoutError</span> " ;
                      }
                     ?>
                     </div>
    <input type="text" name="yearpassout" class="form-control" id="yearPassout">
  </div>
  <br>
     
     
        <button type="button" id="close"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" >Apply</button>
</form>
      </div>
    </div>
  </div>
</div>
<button type="submit" id="btn"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" hidden>
<?php 
if ($jobid==0){
  $f2="close";
}
else {
  $f2="btn";
}
?>
<script>
 

  
   
window.onload = function(){
  document.getElementById('btn').click();
}
  
  


    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    
</script>

</body>
</html>