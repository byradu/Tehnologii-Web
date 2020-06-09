<?php
session_start();
?>


<?php
    if(isset($_POST['submit-inventory'])){
        require 'connection.inc.php';

        if (isset($_GET['id'])) {
            $id_moneda = $_GET['id'];
            $id_user = $_SESSION['ID'];
            echo 'id ban: '. $id_moneda . '  iduser:'.$id_user;
            $sql = "INSERT INTO inventory (id_user,id_coin) values(".$id_user.",".$id_moneda.");";
            // echo '<p style="margin-left:30vw;color:red;font-size:50px;">'. $id_user . '</p>';
            $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                //echo 'Sql error';
                header("Location:../Gallery/gallery.php?error=sqlerror");
                exit();
            }
            // mysqli_stmt_bind_param($stmt,"ii",$id_user,$id_moneda);
            mysqli_stmt_execute($stmt);
            //echo 'Coin inserted!'
            header("Location:../Gallery/gallery.php");
            //echo '<p style="margin-left:30vw;color:red;font-size:50px;">'. $id_user . '</p>';
            // header("Location:gallery.php?added=success");
    }
    }
