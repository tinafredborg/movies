<?php
include '../include/dbh.php';

$username = $_POST['username']; //Set UserName
$password = $_POST['password']; //Set Password
$msg ='';
if(isset ($username, $password)) {
    ob_start();

    $sql="SELECT * FROM admin WHERE user=('$username') and password=SHA('$password') LIMIT 1";
    try {
        $conn = Database::connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $result = $stmt->fetchAll();

    // If result matched $username and $password, table row must be 1 row
    if(!empty($result)){
        // Register $username, $password and redirect to file "admin.php"
        session_start();
        $_SESSION['admin'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['name']= $username;
        header("location:admin.php");
    } else {
        $msg = "Wrong Username or Password. Please retry";
        header("location:login.php?msg=$msg");
    }
    ob_end_flush();
}
else {
    header("location:login.php?msg=Please enter some username and password");
}
?>