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
       
      
       .card4{
  background-image: url('img3.jpg');
    background-repeat: no-repeat;
    background-size:cover;
    position:fixed !important;
    top:0px;
    width:100%;
    z-index: 2;
}
.space{
  height:60px;
}
a:hover{
  color:white !important;
  background-color:#2C3539;
}
.btn2{
  padding: 7px !important;
  border-radius:4px !important;
}
   </style>
</head>
<body>
  <div class="space"></div>
<nav class="card4 navbar navbar-expand navbar-light">
  <div class="container-fluid">
    
    <a class="btn2 navbar-brand text-black" href="home.php">Job Portal</a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto  mb-lg-0">
        <li class="nav-item">
          <a class="btn2 nav-link active text-black "  href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="btn2 nav-link  text-black" href="/inmoviduInternship/signIn.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="btn2 nav-link  text-black" href="/inmoviduInternship/career.php?jobid=0">Apply</a>
        </li>
        
       
      </ul>
     
    </div>
  </div>
  
</nav>
</body>
</html>