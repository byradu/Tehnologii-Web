<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numismatic Artefact Explorer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="logo.jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="flex-nav">
        <ul>
            <!-- <li>
                <a href="Login/login.php">Login</a>
            </li> -->
            <!-- <li>
                <a href="Register/register.php">Register</a>
            </li> -->
            <li>
                <a href="$">My collection</a>
            </li>
            <li>
                <a href="Gallery/gallery.php">Gallery</a>
            </li>
            <li>
                <a href="https://github.com/byradu/Tehnologii-Web"><i class="fa fa-github"></i></a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <main>
        <p style="text-align: center">
            Welcome to Numismatic Artefact Explorer, 
            <?php 
                echo '<br>' .  $_SESSION['username'] . ' !';
            ?>
        </p>
    </main>
    <footer>
        Created by:&copy; pamhopa, TheTaller
        <span>All rights reserved.</span>
    </footer>
</body>

</html>