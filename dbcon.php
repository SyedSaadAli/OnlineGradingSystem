<?php

$hostname="localhost";
$username="root";
$password="";
$dbname="onlinegradingsystem";

$db=mysqli_connect($hostname, $username,$password,$dbname);
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}


?>