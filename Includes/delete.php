<?php
session_start();
if (isset($_POST['delete-gallery'])) {
    require 'connection.inc.php';

    if (isset($_GET['id'])) {
        $id_moneda = $_GET['id'];
        $sql = "DELETE FROM coins where id=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../Gallery/gallery.php?error=sqlerror");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $id_moneda);
        mysqli_stmt_execute($stmt);
        header("Location:../Gallery/gallery.php");
    }
}
