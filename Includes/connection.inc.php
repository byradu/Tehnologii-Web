<?php 
$srvname = "localhost";
$dbusername = "root";
$dbpass = "";
$dbname = "twdb";

$conn = mysqli_connect($srvname, $dbusername, $dbpass, $dbname);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
