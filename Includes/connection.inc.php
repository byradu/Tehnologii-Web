<?php 
$srvname = "localhost";
$dbusername = "root";
$dbpass = "";
$dbname = "twdb";

$conn = mysqli_connect($srvname, $dbusername, $dbpass, $dbname);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

// datele mele de login
//<?php 
// $srvname = "localhost";
// $dbusername = "root";
// $dbpass = "IOnIOqwer112";
// $dbname = "numax";

// $conn = mysqli_connect($srvname, $dbusername, $dbpass, $dbname);

// if(!$conn){
//     die("Connection failed: ".mysqli_connect_error());
// }
