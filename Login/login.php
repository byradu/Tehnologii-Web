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
        <a href="../index.html">Home</a>
    </div>
    <form action="../Includes/login.inc.php" method="POST">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <!-- <label for="email">Email</label> -->
                <input type="text" placeholder="Email or Username" id="email" name="username" value="">
            </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <!-- <label for="password">Password</label> -->
                <input type="password" placeholder="Password" id="password" name="password" value="">
            </div>
            <input class="btn" type="submit" name="submit" value="Log in">
        </div>
    </form>
</body>

</html>