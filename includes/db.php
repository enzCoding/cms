<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cms";
// Create connection
$connection = mysqli_connect($servername,$username,$password,$database);
mysqli_set_charset($connection,'UTF8');
//Check connection
if(!$connection){
    die("Connection faled" . mysqli_connect_error());
}