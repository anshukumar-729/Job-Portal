<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <style>
     
a,
a:hover,
a:focus{
	color: inherit;
	text-decoration: none;
	transition: all 0.3s;
}

/* Side Bar*/



#sidebar.active {
    margin-left: -250px;
}
.wrapper{
	display: flex;
	text-decoration: none;
	transition: all 0.3s;
}

#sidebar{
	min-width: 250px;
	max-width: 250px;
	background: #7386D5;
	color: #fff;
	transition: all 0.3s;
}


#sidebar .sidebar-header{
	padding: 20px;
	background: #6d7fcc;
}
#sidebar ul.components{
	padding: 20px 0;
	border-bottom: 1px solid #47748b;
}

#sidebar ul p{
	color: #fff;
	padding: 10px;
}

#sidebar ul li a{
	padding: 10px;
	font-size: 1.1em;
	display: block;
}

#sidebar ul li a:hover{
	color: #7386D5;
	background: #fff;
}
#sidebar ul li.active>a,
a[aria-expanded="true"] {
	color: #fff;
	background: #6d7fcc;
}

a[data-toggle="collapse"]{
	position: relative;
}

.dropdown-toggle::after{
	display: block;
	position: absolute;
	top: 50%;
	right: 20%;
	transform: translateY(-50%);
}
ul ul a{
	font-size: 0.9em !important;
	padding-left: 30px !important;
	background: #6d7fcc;
}

#content{
	width: 100%;
	padding: 20px;
	min-height: 100vh;
	transition: all 0.3s;
}


@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
}

      .card2{
  background-image: url('img2.jpg');
    background-repeat: no-repeat;
    background-size:cover;
}
.card3{
  background:#e8ffe4;
}
    </style>
</head>
<body>
    
<div class="card2" id="content">

<a style="background-color:#7386D5" href="#AddJob"  class="btn text-white ml-4 mb-3" data-toggle="collapse">Post Jobs</a>
<div id="AddJob" class="card3 container collapse p-3 border">
<form action="" method="POST">
  <div class="form-group">
    <div class="d-flex">
    <label for="companyName" class="text-muted">Company Name</label>
    <?php if($companynameError){
      echo"<span>$companynameError</span>";
    }
    ?>
    </div>
    <input type="text" class="form-control" name="companyname" id="companyName">
  </div>
  <div class="form-group">
  <div class="d-flex">
    <label for="position" class="text-muted">Position</label>
    <?php if($positionError){
      echo"<span>$positionError</span>";
    }
    ?>
    </div>
    <input type="text" class="form-control" name="position" id="position">
  </div>
  <div class="form-group">
  <div class="d-flex">
    <label for="jobDescription" class="text-muted">Job Description</label>
    <?php if($jobdescError){
      echo"<span>$jobdescError</span>";
    }
    ?>
    </div>
    <textarea class="form-control" id="jobDescription" name="jobdesc" rows="5"></textarea>
  </div>
  <div class="form-group">
  <div class="d-flex">
    <label for="skill" class="text-muted">Skill Required</label>
    <?php if($skillreqError){
      echo"<span>$skillreqError</span>";
    }
    ?>
    </div>
    <input type="text" class="form-control" name="skillreq" id="skill">
  </div>
  <div class="form-group">
  <div class="d-flex">
    <label for="ctc" class="text-muted">CTC</label>
    <?php if($ctcError){
      echo"<span>$ctcError</span>";
    }
    ?>
    </div>
    <input type="text" class="form-control" name="ctc" id="ctc">
  </div>
  <div class="form-group">
  <div class="d-flex">
    <label for="opening" class="text-muted">Opening</label>
    <?php if($openingError){
      echo"<span>$openingError</span>";
    }
    ?>
    </div>
    <input type="text" class="form-control" name="opening" id="opening">
  </div>
  <button type="submit" style="background-color:#7386D5" class="btn text-white mb-3" >Submit</button>

</form>
</div>
  	<div  class="card3 col-12 container-fluid">
  		<h4>My Jobs</h4>
		<table class="table mr-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Company Name</th>
      <th scope="col">Position</th>
      <th scope="col">CTC</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
  $sql = " SELECT * FROM `$email` ";
  $result = mysqli_query($conn,$sql);
  if ($result){
  $num=mysqli_num_rows($result);
      $index=1;
      while($row=mysqli_fetch_assoc($result)){
      
      $companyname=$row['companyname'];
      $position=$row['position'];
      $ctc=$row['ctc'];
      
      echo " <tr>
      <th >$index</th>
      <td>$companyname</td>
      <td>$position</td>
      <td>$ctc</td>
    </tr>";
    $index++;
      }
}
else{
  echo "Not Found ".mysqli_error($conn);
}
 ?>
   
  </tbody>
</table>

  	</div>
  	  






</div>


</div>








</body>
</html>