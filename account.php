<?php
include "session.php";
require('serverconn.php');

$mysqli =  new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
if ($mysqli->connect_errno)
{   print("<br>Connect failed: " . $mysqli->connect_error);
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>pcbuild Project build</title>
        <meta charset="utf-8">
        <meta name="author" content="Harry Scott">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        
        <style>
            .bg-main {
                background-color: #d3d3d3 !important;
            }
        </style>
        
        <script>
            function popup(){
                var x = document.getElementById("myDIV");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>
    </head>
    
    <body style="padding-top: 65px" class="bg-main">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">

                <div class="navbar-header">
                    <a class="navbar-brand" href="index.htm">PCBuild</a>
                </div>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="build.php">Builds</a></li>
                    <li class="nav-item active"><a class="nav-link active" href="account.php">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Page 1</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Page 2</a></li>
                </ul>
                
                <?php
                echo "<p class='text-white mr-sm-2 my-2' >";
                echo $_SESSION['username'];
                echo "</p>";
                ?>
                
                <label class="text-white mr-sm-2 my-2 my-sm-0"></label>

                <form class="form-inline" action="login.php">
                    <label class="text-white mr-sm-2 my-2 my-sm-0">Login</label>
                    <input class="form-control mr-sm-2" name="username" type="text" placeholder="Username" aria-label="Username">
                    <input class="form-control mr-sm-2" name="password" type="password" placeholder="Password" aria-label="Password">
                    <button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" name="submit" type="submit">Login</button>
                </form>

                <a href="signup.php" class="text-white btn btn-default my-2 my-sm-0">SignUp</a>
            </div>
        </nav>
        
        <div class="container">
            <h1>Your Account Details</h1>
            <?php
            $username = $_SESSION['username'];
            $sSQL = "SELECT username, email FROM user WHERE (`username` = '$username')";
            
            $rsMain = $mysqli->query( $sSQL );
            
            while($row = $rsMain->fetch_assoc()){
                $sUsername = $row["username"];
                $sEmail = $row["email"];
            }
            
            echo "<p>Username: $sUsername</p>";
            echo "<p>Email: $sEmail</p>";
        
            ?>
            <h2>Edit your account details</h2>
            
            <p>Change your Password</p>
            <button class="btn btn-dark" type="button" onClick="popup()">Open</button>
            <div id="myDIV" style="display: none">
                <form action="changepassword.php" method="post">
                    <p>Enter old Password: <input class="form-control col-sm-3" type="password" name="oldPassword" required></p>
                    <p>Enter new Password: <input class="form-control col-sm-3" type="password" name="newPassword1" required></p>
                    <p>Re-Enter new Password: <input class="form-control col-sm-3" type="password" name="newPassword2" required></p>
                    <p><input class="form-control col-sm-3" type="submit" name="submit" value="Submit" required></p>
                </form>
            </div>
        </div>
    </body>
</html>