<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Coins, Collection">
    <meta name="author" content="Loghin Alexandru-Stelian & Zaharioaei Radu">
    <meta name="description" content="Check your own inventory of coin!">
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

    function ajax_post() {
        var hr = new XMLHttpRequest();
        var ok = 0;
        var url = "ajaxtest.php";

        var taraAsc = false;
        if (document.getElementById("tara-asc").checked) {
            taraAsc = true;
        }

        var taraDesc = false;
        if (document.getElementById("tara-desc").checked) {
            taraDesc = true;
        }


        var ordDesc = false;
        if (document.getElementById("ord-desc").checked) {
            ordDesc = true;
        }


        var ordDesc = document.getElementById("ord-desc").checked ? true : false
        var ordAsc = false;
        if (document.getElementById("ord-asc").checked) {
            ordAsc = true;
        }


        var valueAsc = false;
        if (document.getElementById("value-asc").checked) {
            valueAsc = true;
        }



        var valueDesc = false;
        if (document.getElementById("value-desc").checked) {
            valueDesc = true;
        }

        var conditii = "";

        if (ordDesc == true) {
            ok = 1;
            conditii = "ordDesc=true";
        } else if (ordAsc == true) {
            ok = 1;
            conditii = "ordAsc=true";
        } else if (taraAsc == true) {
            ok = 1;
            conditii = "taraAsc=true";
        } else if (taraDesc == true) {
            ok = 1;
            conditii = "taraDesc=true";
        } else if (valueDesc == true) {
            ok = 1;
            conditii = "valueDesc=true";
        } else if (valueAsc == true) {
            ok = 1;
            conditii = "valueAsc=true";
        } else if (ordAsc == true && taraAsc == true) {
            ok = 1;
            conditii = "ordAsc=true&taraAsc=true";
        } else if (ordAsc == true && taraDesc == true) {
            ok = 1;
            conditii = "ordAsc=true&taraDesc=true";
        } else if (ordDesc == true && taraDesc == true) {
            ok = 1;
            conditii = "ordDesc=true&taraDesc=true";
        } else if (ordDesc == true && taraAsc == true) {
            ok = 1;
            conditii = "ordDesc=true&taraAsc=true";
        } else if (ordAsc == true && valueAsc == true) {
            ok = 1;
            conditii = "ordAsc=true&valueAsc=true";
        } else if (ordAsc == true && valueDesc == true) {
            ok = 1;
            conditii = "ordAsc=true&valueDesc=true";
        } else if (taraAsc == true && valueDesc == true) {
            ok = 1;
            conditii = "taraAsc=true&valueDesc=true";
        } else if (taraAsc == true && valueAsc == true) {
            ok = 1;
            conditii = "taraAsc=true&valueDesc=true";
        } else if (taraDesc == true && valueAsc == true) {
            ok = 1;
            conditii = "taraDesc=true&valueDesc=true";
        } else if (taraDesc == true && valueDesc == true) {
            ok = 1;
            conditii = "taraAsc=true&valueDesc=true";
        } else if (taraDesc == true && valueDesc == true && ordAsc == true) {
            ok = 1;
            conditii = "taraDescsc=true&valueDesc=true?ordAsc=true";
        } else if (taraDesc == true && valueDesc == true && ordDesc == true) {
            ok = 1;
            conditii = "taraDesc=true&valueDesc=true?ordDesc=true";
        } else if (taraAsc == true && valueDesc == true && ordDesc == true) {
            ok = 1;
            conditii = "taraAsc=true&valueDesc=true?ordDesc=true";
        } else if (taraDesc == true && valueDesc == true && ordDesc == true) {
            ok = 1;
            conditii = "taraDesc=true&valueDesc=true?ordDesc=true";
        } else if (taraDesc == true && valueAsc == true && ordDesc == true) {
            ok = 1;
            conditii = "taraDesc=true&valueAsc=true?ordDesc=true";
        }
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        
        hr.onreadystatechange = function() {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                document.getElementById("raspuns-colectie").innerHTML = return_data;
            }
        }
        if (ok == 0) {
            hr.send();
        } else if (ok == 1) {
            hr.send(conditii);
        }
        document.getElementById("raspuns-colectie").innerHTML = '<p style="font-size:200%;">Incarcam colectia😁...</p>';
    }
    // ajax call on page load
    window.addEventListener('load', (event) => {
        
        ajax_post();
}); 
</script>

<body>
    <header>


    </header>
    <main>
        <div class="sortare">
            <?php if ($_SESSION['username'] != "admin")
                echo ' 
         <a href="../index.php" class="go-home">Home</a>'; ?>
            <!-- <form action="my_collection.php" method="POST"> -->
            <div class="form">
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
                <button onclick="javascript:ajax_post();" class="sort-button">Sorteaza</button>
                <!-- </form> -->
            </div>
        </div>

        <?php
        include_once '../Includes/connection.inc.php';
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
                from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . ";";
        

        echo '<div class="galerie">
                    <ul id="raspuns-colectie" style="margin-top:10vh;">

                    </ul></div>';

        if (isset($_GET['id'])) {
            $id_moneda = $_GET['id'];
            $id_user = $_SESSION['ID'];
            $sql = "DELETE FROM inventory where id_user=? and id=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location:my_collection.php?error=sqlerror");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "ii", $id_user, $id_moneda);
            mysqli_stmt_execute($stmt);
            echo '<script>window.location="my_collection.php"</script';
        }
        ?>
        </ul>
        </div>
    </main>

</body>

</html>