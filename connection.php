<?php
// THIS part is for connecting database so it must be in included in all the php file
$servername = "localhost";
$username = "root";
$password = "";
$database = "inmovidu";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die ("Sorry we are unable to connect your web to database: ".mysqli_connect_error());
}
?>
 