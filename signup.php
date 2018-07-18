<?php

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
            <h1>Signup</h1>
            <br>
            <form action="createaccount.php" method="post">
                <p><input class="form-control col-sm-3" type="text" placeholder="Username" name="username" required></p>
                <p><input class="form-control col-sm-3" type="email" placeholder="Email" name="email" required></p>
                <p><input class="form-control col-sm-3" type="password" placeholder="Password" name="password" required></p>
                <p><input class="form-control col-sm-3" type="password" placeholder="Re-enter Password" name="password2" required></p>
                <p><input class="form-control col-sm-1" type="submit" name="submit" value="Submit"/></p>
            </form>
        </div>
	</body>
</html>