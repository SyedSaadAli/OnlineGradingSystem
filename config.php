<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="form";

$conn=mysqli_connect($hostname, $username,$password,$dbname);
if(!$conn)  echo "could not conntect to database";
// if($conn){
//     echo "success";
// }
// else{
//     echo "unsuccess";
// }

?>