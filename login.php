<?php
    // if form not yet submitted
    // display form
    if (!isset($_POST['submit'])) {
      $username = (isset($_COOKIE['name'])) ? $_COOKIE['name'] : '';      
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/logo.png" type="image/png">
  <title>Project Lemons</title>
  <link rel="stylesheet" href="style.css"> <!--background/css-->

</head>

  <title>Login Form</title>

  <link rel="stylesheet" type="text/css" href="style.css">
<body>

  <div id="loginhead">
  <img src="images/header.jpg" alt="Logo" width="340px" height="100px" />

  <div class="loginbox">
  <img src="images/avatar2.png" class="avatar">
    <h1>Login Here</h1>
    <form method="POST" action="login.php">
      <p>Username</p>
	  <!-- stores what the user types into the variable username and sends it to the userComfirmation page -->
	  
      <input type="text" name="username" placeholder="Enter Username">
      <input type="submit" name="submit" value="Login">
    </form>
  </div> 

</body>
</html>

<?php      
    // if form submitted
    // check supplied login credentials 
	// against database
	} else {
		$username = $_POST['username'];
		
  
        // check input
		if (empty($username)) {
		   die('ERROR: Please enter your username');  
		}
		
  
	// attempt database connection
	$mysqli = new mysqli("localhost", "root", "root", "projectlemons");
  
	// escape special characters in input
	$username = $mysqli->escape_string($username);
  
    // check if usernames exists      
    $sql = "SELECT COUNT(*) FROM users WHERE username = '$username'";
    if ($result = $mysqli->query($sql)) {
      $row = $result->fetch_array();
      // if yes, fetch the encrypted password
      if ($row[0] == 1) {
        $sql = "SELECT username FROM users WHERE username = '$username'";        
        // encrypt the password entered into the form
        // test it against the encrypted password stored in the database
        // if the two match, the password is correct
        if ($result = $mysqli->query($sql)) {
          $row = $result->fetch_array();          
          $salt = $row[0]; 
        
            // password correct
			// start a new session  
			// save the username to the session
			// if required, set a cookie with the username
			// redirect the browser to the main application page 
			session_start();
			$_SESSION['username'] = $username;
			header('Location: firstpage.php');           
		  } else {
             echo 'You entered an incorrect password.';            
          }
		} else {
			echo "ERROR: Could not execute $sql. " . print_r($mysqli->error);
			header('Location: login.php'); 
		}          
    } else {
      echo 'You entered an incorrect username.';            
    
  }
  
    // close connection
    $mysqli-> close();     
}
?> 
