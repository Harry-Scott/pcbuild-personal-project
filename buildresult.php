<?php
$type = $_REQUEST['type'];
$use = $_REQUEST['use'];
$price = $_REQUEST['price'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>pcbuild Project build</title>
        <meta charset="utf-8">
        <meta name="author" content="Harry Scott">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        
        <script>
            function myFunction() {
            var x = document.getElementById("myDIV");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>
        
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
                    <li class="nav-item active"><a class="nav-link active" href="build.php">Builds</a></li>
                    <li class="nav-item"><a class="nav-link" href="account.php">My Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Page 1</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Page 2</a></li>
                </ul>

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
            <?php
            $sql = "SELECT * FROM users";
            
            echo "<p>" . $type . "</p>";
            echo $use;
            echo $price;
            
            
            if($type == 1){
                $type = "Desktop PC";
                echo $type;
            }
            ?>
        </div>
    </body>
</html>
