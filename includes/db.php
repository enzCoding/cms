<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cms";
// Create connection
$connection = mysqli_connect($servername,$username,$password,$database);

//Check connection
if(!$connection){
    die("Connection faled" . mysqli_connect_error());
}