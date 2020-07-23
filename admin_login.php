<?php

// set page title
$page_title="Admin Login";
 
// page header html
include 'layout_header.php';
?>
<html>
<body>
    
<form action="connectAdmin.php" method="post">

    		<label for="username"><b>Username</b></label>
    		<input type="text" placeholder="Enter Username" name="username" required>
			<br>
			<br>
    		<label for="password"><b>Password</b></label>
    		<input type="password" placeholder="Enter Password" name="password" required>
			<br>
			<br>
    		<button type="submit" class="btn">Login</button>
</form>
</body>
</html>