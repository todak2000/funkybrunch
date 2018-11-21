<?php


$con = mysqli_connect("localhost","root","","funky_brunch");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>