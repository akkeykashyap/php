<?php
$servername = "localhost";
$username ="root";
$pass = "";
$database = "company";

$conn = mysqli_connect($servername,$username,$pass,$database);

if(!$conn){
  die("connection failed:".mysqli_connect_error());
}

?>
