<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Coins,Collections">
    <meta name="author" content="Loghin Alexandru-Stelian & Zaharioaei Radu">
    <meta name="description" content="Here you can see our collection of coins and can create one for yourself!">
    <title>Numismatic Artefact Explorer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="..\logo.jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

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
        var url = "ajax_gallery.php";

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
        console.log("refresh");
        ajax_post();
    });
</script>

<body>
    <header>
        <?php
        
        ?>
        <!-- <h2>Numismatic Artefact Explorer - Gallery</h2> -->
        <?php
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == "admin") {
                echo '<div class="gallery-upload" style="margin-top:7vh;"> 
                <form action="../Includes/gallery-upload.php" method="POST" enctype="multipart/form-data">
                    <a href="../index.php" style="visibility:hidden;">Home</a><br>
                    <p>Introduceti o moneda noua: </p>    
                    <input required type="text" name="filetitle" placeholder="Titlul monedei">
                    <input required type="text" name="valoare" placeholder="Valoarea">
                    <input required type="text" name="tara" placeholder="Tara">
                    <input required type="date" name="createdAt" placeholder="Perioada de emisie">
                    <input required type="text" name="descriere" placeholder="Descriere">
                    <label for="file" class="sort-button">Incarcati cele 2 fotografii</label>
                    <input required type="file" id="file" name="file[]" multiple placeholder="file" hidden>
                    <button type="submit" name="submit" class="sort-button" style="margin-left:2px;">Adauga in colectie</button>
                </form>
                
            </div>';
                // echo'<h1>HAI ADMINE</h1>';\
            }
        } else {
            echo '<div class="JOS"><p style="font-size:150%;color:greenyellow;margin-top:9vh;" class="p-curcubeu"><a href="../Register/register.php" style="text-decoration:none;color:white;" class="curcubeu">Creati-va cont </a> sau <a href="../Login/login.php" style="text-decoration:none;color:white;" class="curcubeu">inregistrati-va </a> pentru a va putea alcatui o colectie.</p></div>';
        }
        ?>

    </header>
    <main >
        <div class="sortare">
            <?php 
            if (isset($_SESSION['username'])) {
                if ($_SESSION['username'] != "admin")
                    echo ' 
         <a href="../index.php" class="go-home">Home</a>';
            }
            if (!isset($_SESSION['username'])) {
                echo ' 
                <a href="../index.php" class="go-home">Home</a>';
            }
            ?>
            <!-- <form action="gallery.php" method="POST"> -->
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
        <div class="galerie">
            <?php 
                if (isset($_SESSION['username'])) {
                    if ($_SESSION['username'] == "admin")
                        echo '<ul id="raspuns-colectie"style="margin-top:16vh;"class="colectie-raspuns">';
                    else
                        echo '<ul id="raspuns-colectie" class="colectie-raspuns">';
                }
            ?>
            <ul id="raspuns-colectie">
                
            </ul></div>
                <script type="text/javascript">
                function insert_post(coin_id){
                    
                    var hr = new XMLHttpRequest();
                    var param = "coin="+coin_id;
                    var url = "../Includes/insert.php";
                    hr.open("POST", url, true);
                    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    hr.onreadystatechange = function() {
                    if (hr.readyState == 4 && hr.status == 200) {
                        var return_data = hr.responseText;
                        alert(return_data);
                        }
                    }
                    hr.send(param);

                }
                    
                </script>
            </ul>
        </div>
    </main>
</body>

</html>