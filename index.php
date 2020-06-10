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
    <style>
        /* .log-in{
            display:inline;
        } */
        .log{
            margin-left: 2vw;
        }
    </style>
</head>

<body>
    <nav class="flex-nav">
        <ul>
            <?php
        if (isset($_SESSION['username'])) {
            if($_SESSION['username']!="admin")
            echo '<li>
                    <a href="Gallery/my_collection.php">My collection</a>
                </li>';
        } else {
            echo '<li>
                    <a href="Login/login.php">Login</a>
                  </li>
            <li>
                <a href="Register/register.php">Register</a>
            </li>';
        }
            ?>
            <li>
                <a href="Gallery/gallery.php">Gallery</a>
            </li>
            <li>
                <a href="rss.php">RSS Feed</a>
            </li>
            <li>
                <a href="Scholarly/scholarly.html">Scholarly Report</a>
            </li>
            <li>
                <a href="https://github.com/byradu/Tehnologii-Web"><i class="fa fa-github"></i></a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
                echo '<li><a href="logout.php">Logout</a></li>';
            }
            ?>
        </ul>
    </nav>
    <main>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<p class="log-in">Welcome to Numismatic Artefact Explorer,<br>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp' . $_SESSION['username'] . '!</p>';
        } else {
            echo '<p>Welcome to Numismatic Artefact Explorer!</p>';
        }
        ?>

    </main>
    <footer>
        Created by:&copy; pamhopa, TheTaller
        <span>All rights reserved.</span>
    </footer>
</body>

</html>