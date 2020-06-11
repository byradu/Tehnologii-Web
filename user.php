<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="user_style.css">
    <link rel="icon" type="image/png" href="logo.jpg">
</head>

<body>
    <?php
    echo '
        <p id="email-php" style="display:none;">'.$_SESSION['email']. '</p>
    <p>Your username: ' . $_SESSION['username'] . '</p>
        <p>Your email: ' . $_SESSION['email'] . '<button class="show"  id="schimbaEmail">Change email</button><br></p><p><label for="show-parola" id="parola-label" style="visibility:hidden;margin-left:5px;margin-right:3px;">Type your password:</label><input type="text" required name="parola" id="show-parola" style="visibility:hidden;">
        <label for="email-nou" id="email-label" style="visibility:hidden;margin-left:5px;margin-right:3px;">New Email: </label><input type="text"
        required name="email" id="show-email" style="visibility:hidden;"><button onclick="verifEmail()" id="schimba-buton" style="visibility:hidden;" class="show">Schimba EMAIL</button></p>
        
        </p>
        
        ';
    ?>
    <hr style="width:100%;border-color:#E7F6EA;">
    <button onclick="showCollection" class="show">Show me my collection</button>

</body>
<script>
    let emailVechi=document.getElementById("email-php").innerHTML;
    let parolaInput = document.getElementById("show-parola");
    const parolaLabel = document.getElementById("parola-label");
    const emailLabel=document.getElementById("email-label");
    let emailInput=document.getElementById("show-email");
    const schimbaButon = document.getElementById("schimbaEmail");
    const schimbaEmail=document.getElementById("schimba-buton");
    schimbaButon.addEventListener("click", function schimba() {
        if (schimbaButon.innerHTML == "I've changed my mind") {
            schimbaButon.innerHTML = "Change email";
            parolaInput.style.visibility = "hidden";
            parolaLabel.style.visibility = "hidden";
            emailLabel.style.visibility = "hidden";
            emailInput.style.visibility = "hidden";
            schimbaEmail.style.visibility = "hidden";
        }else{
            schimbaButon.innerHTML = "I've changed my mind";
            parolaInput.style.visibility = "visible";
            parolaLabel.style.visibility = "visible";
            emailLabel.style.visibility = "visible";
            emailInput.style.visibility = "visible";
            schimbaEmail.style.visibility = "visible";
        }
    });


    
</script>

</html>