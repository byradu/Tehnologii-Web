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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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
        <?php
        
        ?>
        <!-- <h2>Numismatic Artefact Explorer - Gallery</h2> -->
        <?php
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == "admin") {
                echo '<div class="gallery-upload"> 
                <form action="../Includes/gallery-upload.php" method="POST" enctype="multipart/form-data">
                    <a href="../index.php" style="visibility:hidden;">Home</a><br>
                    <p>Introduceti o moneda noua: </p>    
                    <input required type="text" name="filetitle" placeholder="Titlul monedei">
                    <input required type="text" name="valoare" placeholder="Valoarea">
                    <input required type="text" name="tara" placeholder="Tara">
                    <input required type="date" name="createdAt" placeholder="Perioada de emisie">
                    <input required type="text" name="descriere" placeholder="Descriere">
                    <label for="file">Incarcati o poza</label>
                    <input required type="file" id="file" name="file" placeholder="file" hidden>
                    <button type="submit" name="submit">Adauga in colectie</button>
                </form>
                
            </div>';
                // echo'<h1>HAI ADMINE</h1>';\
            }
        } else {
            echo '<div class="JOS"><p style="font-size:150%;color:greenyellow;margin-top:9vh;" class="p-curcubeu"><a href="../Login/login.php" style="text-decoration:none;color:white;" class="curcubeu">Creati-va cont </a>pentru a va putea alcatui o colectie.</p></div>';
        }
        ?>

    </header>
    <main style="background:white;">
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
                <button type="submit" value="submit" class="sort-button">Sorteaza</button>
            </form>
        </div>
        <div class="galerie">
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
                if (isset($_POST['value-desc'])) {
                    $sql = "SELECT * FROM COINS ORDER BY value desc";
                }
                if (isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS ORDER BY value asc";
                }
                if (isset($_POST['tara-desc']) && isset($_POST['ord-desc']) && isset($_POST['value-asc'])) {
                    $sql = "SELECT * FROM COINS order by country,id desc, value asc";
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
                        echo '<li style="text-align:center;background:rgba(255,255,255,0.4); color:black;border:1px solid black;margin:0.5em;max-width:400px;">
                        
                        
                        <div style="background:white;"><img style="height:120px;width:120px;" src="images/' . $row["imgFullName"] . '"> <img style="height:120px;width:120px;"  src="images/' . $row["reversePic"] . '"></div>
                        <p style="max-width:300px;">Title: ' . $row['title'] . '</p>
                        <p>Value: ' . $row['value'] . '</p>
                        <p>Country: ' . $row['country'] . '</p>
                        <p>Created at: ' . $row['createdAt'] . '</p> 
                        <p style="max-width:300px;">Description: ' . $row['description'] . '</p>';
                        if (isset($_SESSION['username'])) {
                            if ($_SESSION['username'] == "admin") {
                                echo '<style>
                                    .galerie{
                                        margin-top:18vh;
                                    }
                                </style>';
                                // echo '<form action="../Includes/delete.php?action=remove&id=' . $row['id'] . '" method="POST" id= "delete">
                                // <button type="submit" id="btn-inventory" name="delete-gallery">Eliminati din galerie</button></li>';
                            } elseif ($_SESSION['username'] != "admin") { /* action="../Includes/insert.php?action=add&id=' . $row['id'] . '" */
                                echo '<style>
                                .galerie{
                                    margin-top:10vh;
                                }
                            </style>';
                                echo '<form method="POST" id= "insert">
                                <button type="button" class="btn-inventory" name="submit-inventory" data-id="' . $row['id'] . '" >Adauga in colectie</button></form></li>';
                            }
                        }
                    }
                }
                ?>
                <script>
                    $(document).ready(function() {
                        $(".btn-inventory").click(function() {
                            var coin_id = $(this).attr("data-id");
                            $.ajax({
                                url: "../Includes/insert.php",
                                method: "post",
                                data: {
                                    coin: coin_id
                                },
                                success: function(response) {
                                    alert(response);
                                }
                            });
                        });
                    });
                </script>
            </ul>
        </div>
    </main>
</body>

</html>