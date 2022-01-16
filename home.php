<?php
require('nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <style>
      .about-section{
        height:600px;
      }
        body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
    </style>
</head>
<body>
<div class="about-section">
  <h1>About Us Page</h1>
  <p>This is a job portal which can handle many company and client at same time </p>
  <p></p>
</div>
<hr>
<h2 style="text-align:center">About Me</h2>
<div class="row bg-black">
  <div class="column">
    <div class="card">
      <img src="my profile.jpeg" alt="" style="width:100%">
      <div class="container">
        <h3>Anshu kumar</h3>
        <p class="title">Web developer</p>
        <p>Student at IIT BHILAI</p>
        <p>anshukumar@iitbhilai.ac.in</p>
        <a href="https://www.linkedin.com/in/anshu-kumar-363030203/">Go to Linked In Profile</a><br>
        <a href="https://github.com/anshukumar-729">Got to Github Profile</a>
        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="codechefRating.png" alt="" style="width:100%">
      <div class="container">
      <h4>Coder</h4>
        <p class="title">3 Star coder at codechef</p>
        <a href="https://www.codechef.com/users/code_with_ak">Go to codechef profile</a>
         </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="logic.png" alt="" style="width:100%">
      <div class="container">
        <h4 >Logic Maker</h4>
         </div>
    </div>
  </div>
</div>

</body>
</html>