<?php
session_start(); //start the current session
session_destroy();
header("location:login.php?msg=Successfully Logged out"); //move back to login.php with a logout message