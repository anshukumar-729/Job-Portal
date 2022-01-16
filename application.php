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

 
  	<div  class="card3 col-12 container-fluid">
  		
		<table class="table mr-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Candidate Name</th>
      <th scope="col">Position</th>
      <th scope="col">Year Passout</th>
    </tr>
  </thead>
  <tbody>

  <?php

    $sql1= "SELECT * FROM `registration` WHERE email='$email'";
    $result2 = mysqli_query($conn,$sql1);
    $esno= mysqli_fetch_assoc($result2)['sno'];
    
   

    $sql3 = " SELECT * FROM `$email` ";
    $result4 = mysqli_query($conn,$sql3);
    while($ro= mysqli_fetch_assoc($result4)){
            $sno=$ro['sno'];
            $jobid=$esno.'000'.$sno;
            // echo "JOBID".$jobid;
 $sql2= "SELECT * FROM `applicants` WHERE jobid='$jobid' ";
    $result3 = mysqli_query($conn,$sql2);
        // echo mysqli_num_rows($result3);
        $index=1;
        while($r= mysqli_fetch_assoc($result3)){
            $name=$r['name'];
            $position=$r['position'];
            $yearpassout=$r['yearpassout'];
            
            echo " <tr>
            <th >$index</th>
            <td>$name</td>
            <td>$position</td>
            <td>$yearpassout</td>
          </tr>";
          $index++;
        }
    }
    
        



  ?>
   
  </tbody>
</table>

  	</div>






</div>


</div>








</body>
</html>