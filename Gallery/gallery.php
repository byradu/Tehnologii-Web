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

    function checkValue(s){
        if((s=="value-asc")&&(document.getElementById("value-desc").checked)){
            alert("Alegeti doar unul dintre filtrele: \n Valoare asc \n Valoare desc");
            document.getElementById("value-asc").checked=false;
        }else if((s=="value-desc")&&(document.getElementById("value-asc").checked)){
            alert("Alegeti doar unul dintre filtrele: \n Valoare asc \n Valoare desc");
            document.getElementById("value-desc").checked=false;
        }
    }
</script>

<body>
    <header>
        <!-- <h2>Numismatic Artefact Explorer - Gallery</h2> -->
        <?php
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == "admin") {
                echo '<div class="gallery-upload"> 
                <form action="../Includes/gallery-upload.php" method="POST" enctype="multipart/form-data">
                    <a href="../index.php">Home</a><br>
                    <p>Introduceti o moneda noua: </p>    
                    <input required type="text" name="filetitle" placeholder="Titlul monedei">
                    <input required type="number" name="valoare" placeholder="Valoarea">
                    <input required type="text" name="tara" placeholder="Tara">
                    <input required type="date" name="createdAt" placeholder="Perioada de emisie">
                    <input required type="text" name="descriere" placeholder="Descriere">
                    <label for="file">Incarcati o poza</label>
                    <input required type="file" id="file" name="file" placeholder="file" hidden>
                    <button type="submit" name="submit">Adauga in colectie</button>
                </form>
                
            </div>';
                // echo'<h1>HAI ADMINE</h1>';\
            } else {
                echo '<div class="gallery-upload"> 
                <form action="../Includes/gallery-upload.php" method="POST" enctype="multipart/form-data">
                    <a href="../index.php">Home</a><br>
                    <p>Introduceti moneda dorita in propria colectie: </p>    
                    <input required type="text" name="filetitle" placeholder="Titlul monedei">
                    <input required type="number" name="valoare" placeholder="Valoarea">
                    <input required type="text" name="tara" placeholder="Tara">
                    <input required type="date" name="createdAt" placeholder="Perioada de emisie">
                    <input required type="text" name="descriere" placeholder="Descriere">
                    <label for="file">Incarcati o poza</label>
                    <input required type="file" id="file" name="file" placeholder="file" hidden>
                    <button type="submit" name="submit">Adauga in colectie</button>
                </form>
                
            </div>';
            }
        } else {
            echo '<p style="font-size:150%;color:white;">Creati-va un cont pentru a putea sa va alcatuiti o colectie</p>';
        }
        ?>

    </header>
    <main style="background:white;">
        <div class="sortare">
            <form action="gallery.php" method="POST">
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
                
                <!-- <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox"> -->
            </form>
        </div>
        <div>
            <!-- <h3>Romania 🥇🥇🥇🥇🥇🥇🥇🥇🥇</h3> -->

            <ul>
                <?php
                include_once '../Includes/connection.inc.php';
                $sql = "SELECT * FROM COINS";
                if (isset($_POST['ord-desc'])) {
                    $sql = "SELECT * FROM COINS order by 1 DESC";
                }
                if (isset($_POST['ord-ASC'])) {
                    $sql = "SELECT * FROM COINS order by 1 asc";
                }
                if (isset($_POST['tara-desc'])) {
                    $sql = "SELECT * FROM COINS order by country DESC";
                }
                if (isset($_POST['tara-asc'])) {
                    $sql = "SELECT * FROM COINS order by country ASC";
                }
                if (isset($_POST['tara-asc']) && isset($_POST['ord-asc'])) {
                    $sql = "SELECT * FROM COINS order by country,1 ASC";
                }
                if (isset($_POST['tara-asc']) && isset($_POST['ord-desc'])) {
                    $sql = "SELECT * FROM COINS order by country ASC,1 desc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-asc'])) {
                    $sql = "SELECT * FROM COINS order by country desc,1 ASC";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc'])) {
                    $sql = "SELECT * FROM COINS order by country,1 desc";
                }
                if(isset($_POST['value-desc'])){
                    $sql="SELECT * FROM COINS ORDER BY value desc";
                }
                if(isset($_POST['value-asc'])){
                    $sql="SELECT * FROM COINS ORDER BY value asc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc']) &&isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country,1 desc, value asc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc']) &&isset($_POST['value-desc'])) {
                    $sql = "SELECT * FROM COINS order by country,1 desc, value desc";
                }  
                if (isset($_POST['tara-asc']) && isset($_POST['ord-desc']) &&isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country asc,1 desc, value asc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc']) &&isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country,1 desc, value asc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-asc']) &&isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country,1 asc, value asc";
                }    
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc']) &&isset($_POST['value-desc'])) {
                    $sql = "SELECT * FROM COINS order by country,1 desc, value desc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-asc']) &&isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country,1 asc, value asc";
                }
                


                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'SQL ERROR';
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li style="text-align:center;background:rgba(255,255,255,0.4); color:black;border:1px solid black;margin:0.5em;">

                        <div style="background:white;"><img src="gallery/' . $row["imgFullName"] . '"></div>
                        <p>Title: ' . $row['title'] . '</p>
                        <p>Value: ' . $row['value'] . '</p>
                        <p>Country: ' . $row['country'] . '</p>
                        <p>Created at: ' . $row['createdAt'] . '</p>
                        <p class="wrapword">Description: ' . $row['description'] . '</p>
                        </li>';
                    }
                }
                ?>
                <!-- <li style="text-align:center;background:rgba(255,255,255,0.4); color:black;border:1px solid black;border-radius:100deg;">
                    <h5> Title: 5 Sutimi - Alexandru Ioan Cuza</h5>
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a15796da7.25898472-original.jpg" alt="5sute">
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a153fd816.84235286-original.jpg" alt="5sute2">
                    <p>Value:NAN</p>
                    <p>Country: Romania</p>
                    <p>Created at: ?</p>
                    <p>Description: o moneda</p>
                </li>
                <li>
                    <h5>10 Bani - Carol I</h5>
                    <img src="https://en.numista.com/catalogue/photos/roumanie/1035-original.jpg" alt="carol1">
                    <img src="https://en.numista.com/catalogue/photos/roumanie/1036-original.jpg" alt="carol1.2">
                </li>
                <li>
                    <h5>1 Leu</h5>
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5ea31101efc3d8.38696812-original.jpg" alt="1leu1">
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5ea3110227a1b0.92580680-original.jpg" alt="1leu1.2">
                </li>
                <li>
                    <h5>100 Lei - Mihai I</h5>
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5e94f9720da146.83450184-original.jpg" alt="mihai1">
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5e94f972614405.96629005-original.jpg" alt="mihai1.2">
                </li>
                <li>
                    <h5>5 Sutimi - Alexandru Ioan Cuza</h5>
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a15796da7.25898472-original.jpg" alt="5sute">
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a153fd816.84235286-original.jpg" alt="5sute2">
                </li>
            </ul>
        </div>
        <div>
            <h3>China</h3>
            <ul>
                <li>
                    <h5>5 Sutimi - Alexandru Ioan Cuza</h5>
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a15796da7.25898472-original.jpg" alt="5sute">
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a153fd816.84235286-original.jpg" alt="5sute2">
                </li>
                <li>
                    <h5>10 Bani - Carol I</h5>
                    <img src="https://en.numista.com/catalogue/photos/roumanie/1035-original.jpg" alt="carol1">
                    <img src="https://en.numista.com/catalogue/photos/roumanie/1036-original.jpg" alt="carol1.2">
                </li>
                <li>
                    <h5>1 Leu</h5>
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5ea31101efc3d8.38696812-original.jpg" alt="1leu1">
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5ea3110227a1b0.92580680-original.jpg" alt="1leu1.2">
                </li>
                <li>
                    <h5>100 Lei - Mihai I</h5>
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5e94f9720da146.83450184-original.jpg" alt="mihai1">
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5e94f972614405.96629005-original.jpg" alt="mihai1.2">
                </li>
                <li>
                    <h5>5 Sutimi - Alexandru Ioan Cuza</h5>
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a15796da7.25898472-original.jpg" alt="5sute">
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a153fd816.84235286-original.jpg" alt="5sute2">
                </li>
            </ul>
        </div>
        <div>
            <h3>USA</h3>
            <ul>
                <li>
                    <h5>5 Sutimi - Alexandru Ioan Cuza</h5>
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a15796da7.25898472-original.jpg" alt="5sute">
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a153fd816.84235286-original.jpg" alt="5sute2">
                </li>
                <li>
                    <h5>10 Bani - Carol I</h5>
                    <img src="https://en.numista.com/catalogue/photos/roumanie/1035-original.jpg" alt="carol1">
                    <img src="https://en.numista.com/catalogue/photos/roumanie/1036-original.jpg" alt="carol1.2">
                </li>
                <li>
                    <h5>1 Leu</h5>
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5ea31101efc3d8.38696812-original.jpg" alt="1leu1">
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5ea3110227a1b0.92580680-original.jpg" alt="1leu1.2">
                </li>
                <li>
                    <h5>100 Lei - Mihai I</h5>
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5e94f9720da146.83450184-original.jpg" alt="mihai1">
                    <img class="bnc" src="https://en.numista.com/catalogue/photos/roumanie/5e94f972614405.96629005-original.jpg" alt="mihai1.2">
                </li>
                <li>
                    <h5>5 Sutimi - Alexandru Ioan Cuza</h5>
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a15796da7.25898472-original.jpg" alt="5sute">
                    <img src="https://en.numista.com/catalogue/photos/roumanie/5e5c5a153fd816.84235286-original.jpg" alt="5sute2">
                </li> -->
            </ul>
        </div>
    </main>

</body>

</html>