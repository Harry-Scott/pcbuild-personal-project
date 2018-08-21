<?php
session_start();

if(!isset($_SESSION['loggedIn'])){
    header("location: index.htm");
    exit();
}

if(!isset($_SESSION['username'])){
    header("location:index.htm");
    exit();
}

?>