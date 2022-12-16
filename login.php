<?php 

// include('server.php'); 

?>

<!DOCTYPE html>
<html>
<head>
	<title> User Login Form</title>
	<link rel="stylesheet type="text/css" href="style.css" >
	
</head>
<body>
	 <div class="header">
	   <h2> Login</h2>
	 </div>
 
 <form method="post" action="code.php">
		 <div class="input-group">
		  
			 <label>Username</label><br>
			 <input type="text" name="Username">
		 </div>
		 
		  <div class="input-group">
			 <label>password</label><br>
			 <input type="password" name="Password">
		 </div>
		
		 <div class="input-group"><br>
			
			 <button type="submit" name="login_btn" class="btn"> Login</button>
		 </div>
		 <p>
		 Not a member ? <a href="#">  Sign Up</a>
</form>
</body>
</html>


