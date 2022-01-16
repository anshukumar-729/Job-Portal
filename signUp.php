
<?php
require 'connection.php';
require 'nav.php';
  $nameError="";
  $emailError="";
  $passwordError="";
  $confirmPasswordError="";
  $phoneNumberError="";

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneNumber=$_POST['phoneNumber'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];
    if(!$name){
      $nameError="*Feild required!!";
    }
    elseif(strlen($name)<3){
      $nameError="*Atleast 3 character required!!";
    }
    elseif (!$email) {
      $emailError="*Feild required!!";
    }
    elseif (!$phoneNumber) {
      $phoneNumberError="*Feild required!!";
    }
    elseif(strlen($phoneNumber)<10){
      $phoneNumberError="*Invalid Number!!";
    }
    elseif (!$password) {
      $passwordError="*Feild required!!";
    }
    elseif (strlen($password)<6) {
      $passwordError="*Password is of atleast 6 lenght";
    }
    elseif ($password!=$confirmPassword) {
      $confirmPasswordError="*It should match with above password";
    }
    else {
      $sql = " SELECT * FROM registration WHERE email='$email' ";
$result = mysqli_query($conn,$sql);
if ($result){
  $num=mysqli_num_rows($result);
  
  if($num!=0){
      while($row=mysqli_fetch_assoc($result)){
       
        echo "<script>
        alert('This email is already registered!!');
        window.location.href='/inmoviduInternship/signUp.php';
        </script>";
      }
  }
  else{
// password hashing 
$password=password_hash($password,PASSWORD_DEFAULT);
$confirmPassword=password_hash($confirmPassword,PASSWORD_DEFAULT);

    $sql = " INSERT INTO `registration` (`name`, `email`, `password`, `confirmpassword`, `phonenumber`) VALUES ('$name', '$email', '$password', '$confirmPassword', '$phoneNumber')";
    $result = mysqli_query($conn,$sql);
    
    if($result){
      $sql= " CREATE TABLE `inmovidu`.`$email` ( `sno` INT(250) NOT NULL AUTO_INCREMENT , `companyname` VARCHAR(50) NOT NULL , `position` VARCHAR(50) NOT NULL , `jobdesc` LONGTEXT NOT NULL , `skillreq` VARCHAR(50) NOT NULL , `ctc` BIGINT(10) NOT NULL, `opening` INT(5) NOT NULL , PRIMARY KEY (`sno`)) ENGINE = InnoDB";
    $result = mysqli_query($conn,$sql);
    if ($result){
     
    }
    else{
     
    }
        echo "<script>
        alert('Resistration successfull!!');
        window.location.href='/inmoviduInternship/signIn.php';
        </script>";
       
    }
  }
}

   
        
    
        
    
    else{
        echo "No new registration was done because.. ".mysqli_error($conn);
    }
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
.btn-primary{
      background-color:#2C3539; !important
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
  margin-left:10px;
}
.card{
  background-image: url('img3.jpg');
    background-repeat: no-repeat;
    background-size:cover;
}
    </style>
</head>

<body>
    <div class="card mt-5  col-11 mb-3 col-sm-7 col-md-6 ml-1 ">
        <div class="card-body">
            <div class="container mt-2 mb-2 col-11 ">
              <h3>Admin Registration Form</h3>
                <form  action="signUp.php"  method="POST">
                    <div class="mb-3">
                      <div class="d-flex">
                      <label for="name"  class="form-label">Full Name</label>
                      <?php if ($nameError){
                        echo  "<span >$nameError</span> " ;
                      }
                     ?>
                     </div>
                      <input type="text" name="name"  class="form-control" id="name"></div>
                    

                    <div class="mb-3">
                    <div class="d-flex">
                      <label for="email"  class="form-label">Email address</label>
                      <?php if ($emailError){
                        echo  "<span >$emailError</span> " ;
                      }
                     ?>
                     </div>
                      <input type="email" name="email" class="form-control" id="email">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                    <div class="d-flex">
                      <label for="phoneNumber" class="form-label">Phone Number</label>
                      <?php if ($phoneNumberError){
                        echo  "<span >$phoneNumberError</span> " ;
                      }
                     ?>
                     </div>
                      <input type="number"  name="phoneNumber" class="form-control" id="phoneNumber"></div>
                    <div class="mb-3">
                    <div class="d-flex">
                      <label for="password" class="form-label">Password</label>
                      <?php if ($passwordError){
                        echo  "<span >$passwordError</span> " ;
                      }
                     ?>
                     </div>
                      <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                    <div class="d-flex">
                      <label for="confirmPassword" class="form-label">Confirm Password</label>
                      <?php if ($confirmPasswordError){
                        echo  "<span >$confirmPasswordError</span> " ;
                      }
                     ?>
                     </div>
                      <input type="text" name="confirmPassword" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button><br><br>
                    <div class="d-flex">
                    <p>Already Registered?&nbsp; </p><a href="signIn.php">Sign In</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    
</script>
</body>

</html>