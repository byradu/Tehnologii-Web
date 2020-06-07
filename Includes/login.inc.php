<?php

if (isset($_POST['submit'])) {

    require 'connection.inc.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: ../Login/login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username=? or email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../Login/login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['password']);
                if ($passCheck == false) {
                    header("Location:../Login/login.php?error=wrongpassword");
                    exit();
                } else if ($passCheck == true) { //ca sa fim singuri sa nu apara ceva random
                    session_start(); //mergi pe index si inainte de toate incepi o sesiune ca sa putem verifica
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['ID'] = $row['id'];
                    header("Location:../Login/login.php?login=succes");
                    header("Location:../index.php");
                    // include('');
                    // exit();
                } else {
                    header("Location:../Login/login.php?error=wrongpassword");
                    exit();
                }
            } else {
                header("Location:../Login/login.php?error=usernotfound");
                // header("Location:../Login/login.php?error=wrongpassword");
                exit();
            }
        }
    }
} else {
    header("Location: ../Login/login.php");
    exit();
}
