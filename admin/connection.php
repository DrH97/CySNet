<?php

//initialize the necessary variables
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'techcrowd2';

//connect to db
$conn = mysqli_connect($server, $username, $password, $database);

//check if connection has failed
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}


?>