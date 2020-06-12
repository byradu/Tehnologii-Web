<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Login on NUMAX">
    <meta name="author" content="Loghin Alexandru-Stelian & Zaharioaei Radu">
    <meta name="description" content="Login for more!">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="../logo.jpg">

</head>

<body>
    <div class="go-home">
        <a href="../index.php">Home</a>
    </div>
    <form action="../Includes/login.inc.php" method="POST" autocomplete="off">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <!-- <label for="email">Email</label> -->
                <input type="text" placeholder="Email or Username" id="email" name="username" value="" autocomplete="off">
            </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <!-- <label for="password">Password</label> -->
                <input type="password" placeholder="Password" id="password" name="password" value="" autocomplete="off">
            </div>
            <input class="btn" type="submit" name="submit" value="Log in">
            <br><br>
            <div class="error">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p>Introduceti toate campurile pentru a va putea logas</p>';
                    } else if ($_GET['error'] == "sqlerror") {
                        echo '<p>Eroare la procesarea conectarii</p>';
                    } else if ($_GET['error'] == "usernotfound") {
                        echo '<p>Acest user nu exista</p>';
                    } else if ($_GET['error'] == "wrongpassword") {
                        echo '<p>Parola gresita</p>';
                    }/* else if($_GET['error']=="existentEmail"){
                        echo '<p>Acest email este utilizat deja </p>'
                        //urmeaza a fi adaugat
                    } */
                }

                ?>
            </div>
        </div>
    </form>
</body>

</html>