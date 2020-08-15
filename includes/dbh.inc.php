<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dbName = "users";
$con = mysqli_connect($servername, $dBUsername, $dBPassword, $dbName);
if(!$con){
  die("Connection failed".mysqli_connect_error());
}
