
<?php 
$srvname = "eu-cdbr-west-03.cleardb.net";
$dbusername = "b4eec35784407c";
$dbpass = "271aba7b";
$dbname = "heroku_5dbaab9b94ca3de";

$conn = mysqli_connect($srvname, $dbusername, $dbpass, $dbname);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

/* stelian
<?php 
$srvname = "localhost";
$dbusername = "root";
$dbpass = "IOnIOqwer112";
$dbname = "numax";

$conn = mysqli_connect($srvname, $dbusername, $dbpass, $dbname);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
} */
// datele lu radu
// <?php 
// $srvname = "localhost";
// $dbusername = "root";
// $dbpass = "";
// $dbname = "twdb";

// $conn = mysqli_connect($srvname, $dbusername, $dbpass, $dbname);

// if(!$conn){
//     die("Connection failed: ".mysqli_connect_error());
// }
