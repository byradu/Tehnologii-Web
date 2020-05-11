<?php

if (isset($_POST['submit'])) {

    require 'connection.inc.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $verify_pass = $_POST['con-password'];

    if (empty($username) || empty($email) || empty($pass) || empty($verify_pass)) {
        header("Location: ../Register/register.php?error=emptyfields&username=" . $username . "&emai=" . $email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../Register/register.php?error=invalidemail&username");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../Register/register.php?error=invalidemail&username=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) || strlen($username) > 15) {
        header("Location: ../Register/register.php?error=invalidusername&email=" . $email);
        exit();
    } else if ($pass !== $verify_pass) {
        header("Location: ../Register/register.php?error=passowrdsdoesntmatch&username=" . $username . "&emai=" . $email);
        exit();
    } else {
        $sql = "SELECT username FROM USERS WHERE username =?"; //necesar pentru ca userul sa nu poata introduce sql in campul username
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Register/register.php?error=sqlerror1");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../Register/register.php?error=usertaken&email=" . $email);
                exit();
            } else {
                $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../Register/register.php?error=sqlerror2");
                    exit();
                } else {
                    $hashedpassword = password_hash($pass, PASSWORD_DEFAULT); //o criptare corespunzatoare
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../Register/register.php?signup=succes");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../Register/register.php");
    exit();
}
