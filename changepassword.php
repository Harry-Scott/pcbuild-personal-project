<?php
//sql server connection
require('serverconn.php');
include "session.php";

$mysqli =  new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
if ($mysqli->connect_errno)
{   print("<br>Connect failed: " . $mysqli->connect_error);
    exit();
}

//Pull password info from the form
$fUsername = $_SESSION['username'];
$oldPassword = $_REQUEST['oldPassword'];
$fNewPassword1 = $_REQUEST['newPassword1'];
$fNewPassword2 = $_REQUEST['newPassword2'];

//Verify old password
$sSQL = "SELECT `password`, `username` FROM `user` WHERE `username` = '$fUsername'";

$rsMain = $mysqli->query( $sSQL );
while($row = $rsMain->fetch_assoc()){
    $sPassword = $row["password"];
}

//if(mysqli_num_rows($rsMain) != 1) {
//    header("location:index.htm");
//}


if($oldPassword != NULL && $fNewPassword1 != NULL && $fNewPassword2 != NULL) {
    if(password_verify($oldPassword, $sPassword)){
        if($fNewPassword1 = $fNewPassword2){
            $ePassword = password_hash($fNewPassword1, PASSWORD_DEFAULT);
            $sSQL = "UPDATE `user` SET `password`='$ePassword' WHERE `username`='$fUsername'";
            $rsMain = $mysqli->query( $sSQL );
            header("location:account.php");
        } else {
            header("location:index.htm");
        }
    } else {
        header("location:cpu.htm");
    }
} else {
    header("location:index.htm");
}


?>
