<?php
//connection_aborted


session_start();

include('dbcon.php'); // this will return $db interface for mySQL database

 $username="";
 $email="";
 $errors =array();
 
// we always come to the server php which need to direct the process based on the origin 
// here we have different choices 
// the user might have clicked the login button
///or the user might have clicked the register button
// so we need to check if  'register' or 'login_user' is set  to decide
 
//3 options
//option 1 reigster new user  'register'
//option 2 logout button 
//option 3 login    'login_user'

//option 1

if (isset($_POST['register'])) {
	
	$username=$_POST['username'];
	$email= $_POST['email'];
	$password_1= $_POST['password_1'];
	$password_2= $_POST['password_2'];
	

//ensure that form fields are filled properly

	if(empty($username)) {
		array_push($errors,"Username is required"); 
	}
	
	if(empty($email)) {
		array_push($errors,"Email is required"); 
	}
	if(empty($password_1)) {
		array_push($errors,"Password is required"); 
	}
	if($password_1 !=$password_2	) {
		array_push($errors,"The two passwords don't match"); 
	}
	
	$emailQuey="SELECT * FROM users WHERE 	email='$email' LIMIT 1";
	$results = mysqli_query($db, $emailQuey);
	
	$userCount=mysqli_num_rows($results);
	if($userCount>0) {
		array_push($errors,"email already exist"); 
	}
	
		
	
	
	
	//if there is no error  save datat to dba_close
	

	
	if(count($errors)==0) {
		$password= md5($password_1); //hash the password
		$sql="INSERT INTO users (username,email,password)
		                  VALUES ('$username','$email','$password')";
				
	    mysqli_query($db,$sql);
		$_SESSION['username']=$username;
		$_SESSION['success']="You are now logged in";
		header('location: index.php');
		echo $sql;
		echo "username added sucessfully";
		
	}
}	


//option 2
//
if (isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}
	
// ... 
//option 3
// LOGIN USER   
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if ( mysqli_num_rows(mysqli_query($db, $query)) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php'); //GO TO THE LOGIN PAGE
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>

