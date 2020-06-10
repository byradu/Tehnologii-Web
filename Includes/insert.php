<?php
session_start();

    $id_user = $_SESSION['ID'];
    $id_coin = $_POST['coin'];

    require 'connection.inc.php';
    $sql = "INSERT INTO inventory (id_user,id_coin) values(" . $id_user . "," . $id_coin . ");";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
       echo 'Eroare de la baza de date!'. $id_coin;
        exit();
    }

        mysqli_stmt_execute($stmt);
        echo 'Moneda a fost adaugata!';
