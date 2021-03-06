<?php
//sql server connection
require('serverconn.php');

$mysqli =  new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
if ($mysqli->connect_errno)
{   print("<br>Connect failed: " . $mysqli->connect_error);
    exit();
}

$eUsername = $_REQUEST['username'];
$ePassword = $_REQUEST['password'];

//Verify password. Hash and compare database password to hashed entered password
$sSQL = "SELECT `password`, `username` FROM `user` WHERE `username` = '$eUsername'";

$rsMain = $mysqli->query( $sSQL );
while($row = $rsMain->fetch_assoc()){
    $sPassword = $row["password"];
    $sUsername = $row["username"];
}

if($sPassword == NULL){
    header("location:index.htm");
} else {
    if(password_verify($ePassword, $sPassword)){
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $eUsername;
        header("location: account.php");
    } else {
        header("location: index.htm");
    }    
}


$rsMain = null;
$mysqli->close();
?>