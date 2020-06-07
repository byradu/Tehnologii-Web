<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numismatic Artefact Explorer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="..\logo.jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<script>
    function checkTara(s) {
        if ((s == "tara-asc") && (document.getElementById("tara-desc").checked)) {
            alert("Selectati doar unul dintre filtrele:\n Tara-ascendent \n Tara-descendent");
            document.getElementById("tara-asc").checked = false;
        } else if ((s == "tara-desc") && (document.getElementById("tara-asc").checked)) {
            alert("Selectati doar unul dintre filtrele:\n Tara-ascendent \n Tara-descendent");
            document.getElementById("tara-desc").checked = false;
        }
    }

    function checkOrd(s) {
        if ((s == "ord-desc") && (document.getElementById("ord-asc").checked)) {
            alert("Selectati doar unul dintre filtrele: \nOrdine-desc\n Ordine-asc");
            document.getElementById("ord-desc").checked = false;
        } else if ((s == "ord-asc") && (document.getElementById("ord-desc").checked)) {
            alert("Selectati doar unul dintre filtrele: \n Ordine-desc\n Ordine-asc");
            document.getElementById("ord-asc").checked = false;
        }
    }

    function checkValue(s) {
        if ((s == "value-asc") && (document.getElementById("value-desc").checked)) {
            alert("Alegeti doar unul dintre filtrele: \n Valoare asc \n Valoare desc");
            document.getElementById("value-asc").checked = false;
        } else if ((s == "value-desc") && (document.getElementById("value-asc").checked)) {
            alert("Alegeti doar unul dintre filtrele: \n Valoare asc \n Valoare desc");
            document.getElementById("value-desc").checked = false;
        }
    }
</script>

<body>
    <header>
        <div class="go-home">
            <a href="../index.php">Home</a>
        </div>

    </header>
    <main style="background:white;">
        <div class="sortare">
            <form action="my_collection.php" method="POST">
                <label for="tara-asc">Tara-ascendent</label>
                <input type="checkbox" id="tara-asc" name="tara-asc" onclick="checkTara('tara-asc')">
                <label for="tara-desc">Tara-descendent</label>
                <input type="checkbox" id="tara-desc" name="tara-desc" onclick="checkTara('tara-desc')">
                <label for="ord-desc">Ordine desc</label>
                <input type="checkbox" id="ord-desc" name="ord-desc" onclick="checkOrd('ord-desc')">
                <label for="ord-asc">Ordine asc</label>
                <input type="checkbox" id="ord-asc" name="ord-asc" onclick="checkOrd('ord-asc')">
                <label for="value-asc">Valoare asc</label>
                <input type="checkbox" id="value-asc" name="value-asc" onclick="checkValue('value-asc')">
                <label for="value-desc">Valoare desc</label>
                <input type="checkbox" id="value-desc" name="value-desc" onclick="checkValue('value-desc')">
                <button type="submit" value="submit">Sorteaza</button>
            </form>
        </div>
        <div>


            <ul>
                <?php
                include_once '../Includes/connection.inc.php';
                $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=".$_SESSION['ID'] .";";
                if (isset($_POST['ord-desc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by INVENTORY.id DESC";
                }
                if (isset($_POST['ord-ASC'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by INVENTORY.id ASC";
                }
                if (isset($_POST['tara-desc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by COINS.country DESC";
                }
                if (isset($_POST['tara-asc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by COINS.country ASC";
                }
                if (isset($_POST['tara-asc']) && isset($_POST['ord-asc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by COINS.country asc, COINS.id asc";
                }
                if (isset($_POST['tara-asc']) && isset($_POST['ord-desc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by COINS.country asc, COINS.id desc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-asc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by COINS.country DESC, COINS.ID asc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by COINS.country DESC, COINS.id desc";
                }
                if (isset($_POST['value-desc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by COINS.value DESC";
                }
                if (isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by COINS.value ASC";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc']) && isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS join inventory on COINS.id=INVENTORY.id_coin where INVENTORY.id_user=" .$_SESSION['ID'] . " order by COINS.value ASC";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc']) && isset($_POST['value-desc'])) {
                    $sql = "SELECT * FROM COINS order by country,id desc, value desc";
                }
                if (isset($_POST['tara-asc']) && isset($_POST['ord-desc']) && isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country asc,id desc, value asc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc']) && isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country,id desc, value asc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-asc']) && isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country,id asc, value asc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc']) && isset($_POST['value-desc'])) {
                    $sql = "SELECT * FROM COINS order by country,id desc, value desc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-asc']) && isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country,id asc, value asc";
                }



                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'SQL ERROR';
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li style="text-align:center;background:rgba(255,255,255,0.4); color:black;border:1px solid black;margin:0.5em;">

                        <div style="background:white;"><img src="' . $row["imgFullName"] . '"></div>
                        <p>Title: ' . $row['title'] . '</p>
                        <p>Value: ' . $row['value'] . '</p>
                        <p>Country: ' . $row['country'] . '</p>
                        <p>Created at: ' . $row['createdAt'] . '</p>
                        <p style="display:none;" class="wrapword">Description: ' . $row['description'] . '</p>';
                        if (isset($_SESSION['username'])) {
                            if ($_SESSION['username'] != "admin") {
                                echo '<form action="my_collection.php?action=remove&id=' . $row['id'] . '" method="POST">
                                <button type="submit" id="btn-inventory" style="display:block;" name="remove-inventory" style="">Elimina din colectie</button></form></li>';
                            }
                        }
                    }
                }
                if (isset($_GET['id'])) {
                    $id_moneda = $_GET['id'];
                    $id_user = $_SESSION['ID'];
                    $sql = "DELETE FROM inventory where id_user=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location:my_collection.php?error=sqlerror");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt, "i", $id_user);
                    mysqli_stmt_execute($stmt);
                    header("Location:my_collection.php?removed=success");
                }
                ?>
            </ul>
        </div>
    </main>

</body>

</html>