<?php
session_start();

define("ADMIN", $_SESSION['name']); //get the user name from the previously registred super global variable
if (!isset($_SESSION['admin'])){ // if session not registered
header("location:login.php"); //redirect to login.php page
}
else //continue to current page
header('Content-Type:text/html; charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Welcome To Admin Page Demonstration</title>
</head>
<body>
<h1>Welcome To Admin Page <?php echo ADMIN /*Echo the username */ ?></h1>
<p><a href="logout.php">Logout</a></p> <!-- A link for the logout page -->
<p><a href="manageProducts.php">Manage Products</a></p>
</body>
</html>