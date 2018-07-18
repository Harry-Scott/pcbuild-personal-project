<?php
//sql server connection
require('serverconn.php');

$mysqli =  new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
if ($mysqli->connect_errno)
{   print("<br>Connect failed: " . $mysqli->connect_error);
    exit();
}

//Pulls details fromt he form
$fUsername = $_REQUEST['username'];
$fEmail = $_REQUEST['email'];

//Pulls passwword from the form in signup.php and hashes it
$fPassword = $_REQUEST['password'];
$ePassword = password_hash($fPassword, PASSWORD_DEFAULT);

//Query to compare entered email to those in the database. Two users cannot use the same email.
//$sqlmail = "SELECT * FROM `user` WHERE (`user`.`email` = '$fEmail');";
//$rsMain = $mysqli->query( $sqlmail );
//
//if(mysqli_num_rows($rsMain) > 0) {
//    $row = mysqli_fetch_assoc($res);
//    if($fEmail == $row['email']){
//        header ("location: signup.php");
//        print("<br>This email is already taken");
//        $mysqli->close();
//    }
//}

$sqlmail = "SELECT COUNT(email) FROM `user` WHERE (`user`.`email` = '$fEmail')";
$rsMain = $mysqli->query( $sqlmail );
while($row = $rsMain->fetch_assoc()){
    $count = $row['COUNT(email)'];
}

if($count > 0){
    header("location: signup.php");
    echo "This email is already taken, please choose another.";
}

//Inserts user into the database, pulling details from the form
$sql = $mysqli->prepare("INSERT INTO `pcbuild`.`user` (`id`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)");
$sql->bind_param("isss", $id, $fUsername, $fEmail, $password);

$id = NULL;
$fUsername = $_REQUEST['username'];
$fEmail = $_REQUEST['email'];
$password = $ePassword;

$sql->execute();
$sql->close();

session_start();
$_SESSION['loggedIn'] = true;
$_SESSION['username'] = $fUsername;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>pcbuild Project</title>
        <meta charset="utf-8">
        <meta name="description" content="Personal Portfolio, php+SQL practice">
        <meta name="author" content="Harry Scott">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        
        <style>
            .bg-main {
                background-color: #d3d3d3 !important;
            }
        </style>
    </head>
    
    <body style="padding-top: 65px" class="bg-main">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            
              	<div class="navbar-header">
                  	<a class="navbar-brand" href="index.htm">PCBuild</a>
                </div>
                
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="build.php">Builds</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Page 1</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Page 2</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <p>Your Details</p>
            <p>Username : <?php echo $fUsername ?></p>
            <p>Email: <?php echo $fEmail ?></p>
        </div>
	</body>
</html>