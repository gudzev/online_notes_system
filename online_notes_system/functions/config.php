<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "notes";

$connect = mysqli_connect($hostname, $username, $password, $database);

if($connect == false)
{
    die("Connection failed.". mysqli_connect_error());
}

?>