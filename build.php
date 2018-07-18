<?php
//sql server connection
include "session.php";
require('serverconn.php');

$mysqli =  new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
if ($mysqli->connect_errno)
{   print("<br>Connect failed: " . $mysqli->connect_error);
    exit();
}

$sqlcpu = "SELECT * FROM part WHERE parttype = 'CPU'";

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
            function popUp(cpu, gpu){
                var x = document.getElementById("cpuDIV");
                var y = document.getElementById("gpuDIV");
                
                if(!cpu == 0){
                    if (x.style.display === "block") {
                        x.style.display = "none";
                    } else {
                        x.style.display = "block";
                    }
                } else if (!gpu == 0){
                    if (y.style.display === "block") {
                        y.style.display = "none";
                    } else {
                        y.style.display = "block";
                    }
                }
            }
            
            function popup2(){
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
                    <li class="nav-item active"><a class="nav-link active" href="build.php">Builds</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">My Account</a></li>
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
            <h1>What are your PC requirements?</h1>
            <h2>Basic Search</h2>

            <form action="buildresult.php" name="build" method="post">
                <div>
                    <label>What type of computer are you looking for?</label>
                    <select class="form-control col-sm-3" name="type">
                        <option value="0">Choose one...</option>
                        <option value="Desktop PC">Desktop PC</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Server">Server</option>
                    </select>
                </div>
                <br>
                
                <div>
                    <label>What are you going to use your PC for?</label>
                    <select class="form-control col-sm-3" name="use">
                        <option value="0">Choose one...</option>
                        <option value="1">Gaming</option>
                        <option value="2">Workstation</option>
                        <option value="3">Home</option>
                        <option value="4">Server</option>
                    </select>
                    <br>
                    
                    <label>What is your price range?</label>
                    <select class="form-control col-sm-3" name="price">
                        <option value="0">Choose one...</option>
                        <option value="1">£0 - £300</option>
                        <option value="2">£301 - £500</option>
                        <option value="3">£501 - £800</option>
                        <option value="4">£801 - £1200</option>
                        <option value="5">£1200+</option>
                    </select>
                    <br>
                </div>
                <br>
                <button class="btn btn-dark" name="submit" type="submit">Submit</button>
            </form>
            
            <br>
            
            <h2>Advanced Search <button class="btn btn-dark" type="button" onClick="popup2()">Open</button></h2>
            
            <div id="myDIV" style="display: none">
                <form action="#######" name="buildadvanced" method="post">
                    <div>
                        <p><label class="mr-sm-2">Choose a CPU: </label><button class="btn btn-dark" type="button" onclick="popUp(1, 0)">Choose a CPU</button></p>
                        <div id="cpuDIV" style="display: none">
                            <?php
                            $rsMain = $mysqli->query( $sqlcpu );
                            echo "<table>\n";
                            while($row = $rsMain->fetch_assoc()){
                                $cpubrand = $row["brand"];
                                $cpuname = $row["partname"];

                                echo "<tr>\n";
                                print "\t<td>$cpubrand</td>\n";
                                print "\t<td>$cpuname</td>\n";
                                echo "</tr>\n";
                            }
                            echo "</table>";
                            ?>

                        </div>
                        <br>

                        <p><label class="mr-sm-2">Choose a GPU: </label><button class="btn btn-dark" type="button" onclick="popUp(0, 1)">Choose a GPU</button></p>
                        <div id="gpuDIV" style="display: none">
                            <p>Hello World!</p>
                        </div>
                        <br>
                    </div>                
                    <br>

                    <button class="btn btn-dark" name="submit" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
<!--
<button class="btn btn-dark" type="button" onclick="myFunction()">Advanced Options</button>
<div id="myDIV" style="display: none" >
    <p>Select your CPU </p>
    <label>Already Owned?</label>
    <label class="switch"> <input type="checkbox"> <span class="slider round"> </span> </label>
</div>
    -->
<!--
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
-->