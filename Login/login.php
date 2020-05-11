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
    <form action="test.php" method="POST">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <!-- <label for="email">Email</label> -->
                <input type="email" placeholder="Email" id="email" name="email" value="">
            </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <!-- <label for="password">Password</label> -->
                <input type="password" placeholder="Password" id="password" name="password" value="">
            </div>
            <input class="btn" type="submit" name="btn" value="Log in">
        </div>
    </form>
</body>

</html>