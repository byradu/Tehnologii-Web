<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="go-home">
        <a href="../index.php">Home</a>
    </div>
    <form action="../Includes/register.inc.php" method="POST">
        <div class="login-box">
            <h1>Sign in</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="username" value="">
            </div>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <!-- <label for="email">Email</label> -->

                <input type="email" placeholder="Email" name="email" value="">
            </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <!-- <label for="password">Password</label> -->

                <input type="password" placeholder="Password" name="password" value="">
            </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <!-- <label for="password">Password</label> -->

                <input type="password" placeholder="Confirm Password" name="con-password" value="">
            </div>

            <input class="btn" type="submit" name="submit" value="Sign In">
            <!-- posibil ca trebuie sa punem name="" la fiecare tag input -->
            <br><br>
            <div class="error">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p>Introduceti toate campurile pentru a va putea inregistra</p>';
                    }else if($_GET['error'] == "invalidemail&username"){
                        echo '<p>Email si username invalide</p>';
                    }else if($_GET['error']=="invalidemail"){
                        echo '<p>Format email invalid</p>';
                    }else if($_GET['error']=="invalidusername"){
                        echo '<p>Username invalid</p>';
                    }else if($_GET['error']=="passwordsdontmatch"){
                        echo 'Parolele nu sunt identice';
                    }else if($_GET['error']=="sqlerror1"){
                        echo 'Eroare la procesarea inregistrarii</p>';
                    }else if($_GET['error']=="emailtaken"){
                        echo 'Acest email este deja utilizat</p>';
                    }
                }else if(isset($_GET['signup'])){
                    if($_GET['signup']=="success"){
                        echo '<p>V-ati inregistrat cu success!</p>
                        <a href="../Login/login.php" style="text-decoration:none;color:#25f54f"><p>Login now!</p></a>';
                    }
                }

                ?>
            </div>
        </div>
    </form>

</body>

</html>