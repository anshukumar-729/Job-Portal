<?php
 $log=$_GET["log"];
 if($log=="out"){
session_start(); 
session_destroy();}
require 'connection.php';
require 'nav.php';


$signInError="";
if ($_SERVER['REQUEST_METHOD']=='POST'){
 
  $Email=$_POST['email'];
 
  $Password=$_POST['password'];

  $sql = " SELECT * FROM registration WHERE email='$Email'  ";
$result = mysqli_query($conn,$sql);
if ($result){
  $num=mysqli_num_rows($result);
  
  if($num!=0){
      while($row=mysqli_fetch_assoc($result)){
        if (password_verify($Password,$row['password'])){
          session_start();
          $_SESSION['email'] = $Email;
        echo "<script>
        
        window.location.href='/inmoviduInternship/dashboard.job.php?email=$Email';
        </script>";
        }
        else{
          $signInError="*Invalid email or password!!";
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
        .mt-5 {
  margin-top: 100px !important
}

.ml-1 {
  margin-left: 30% !important
}
@media screen and (max-width: 576px) {
    .ml-1 {
  margin-left: 3% !important
}
}
@media screen and (max-width: 880px) and (min-width:576px) {
    .ml-1 {
  margin-left: 18% !important
}
}
.card{
    box-shadow: 2px 2px 6px rgb(78, 72, 72);
}
body{
    background-image: url('img2.jpg');
    background-repeat: no-repeat;  
    background-size:cover;  
}
span{
  color:red;
}
.btn-primary{
      background-color:#2C3539; !important
    }
.card{
  background-image: url('img3.jpg');
    background-repeat: no-repeat;
    background-size:cover;
}
    </style>
</head>

<body background="">
    <div class="card mt-5  col-11 mb-3 col-sm-7 col-md-6 ml-1 ">
        <div class="card-body">
            <div class="container mt-2 mb-2 col-11 ">
              <h3>Admin Login Form</h3>
                <form action="signIn.php" method="POST">
                  <?php if($signInError){
                    echo "<center><span>$signInError</span></center><br>";
                  }
                  ?>
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="email">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <div class="mb-3"> <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button><br><br>
                    <p>New User? </p>
                    <div class="d-flex">
                    <p>Create Account &nbsp; </p>
                    <a href="signUp.php">Register</a>
                </div>
                  </form>
            </div>
        </div>
    </div>
</body>

</html>