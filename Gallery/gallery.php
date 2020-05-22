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
            }else{
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
        }else{
            echo '<p style="font-size:150%;color:white;">Creati-va un cont pentru a putea sa va alcatuiti o colectie</p>';
        }
        ?>

    </header>
    <main style="background:white;">
        <div>
            <h3>Romania 🥇🥇🥇🥇🥇🥇🥇🥇🥇</h3>
            
            <ul>
            <?php 
                include_once '../Includes/connection.inc.php';
                $sql="SELECT * FROM COINS";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    echo 'AFARA IN PLM';
                }else{
                    mysqli_stmt_execute($stmt);
                    $result=mysqli_stmt_get_result($stmt);
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<li style="text-align:center;background:rgba(255,255,255,0.4); color:black;border:1px solid black;margin:0.5em;">

                        <img src="gallery/' . $row["imgFullName"] . '">
                        <p>Title: ' .$row['title'] . '</p>
                        <p>Value: ' .$row['value'] . '</p>
                        <p>Country: ' .$row['country'] . '</p>
                        <p>Created at: ' .$row['createdAt'] . '</p>
                        <p>Description: ' .$row['description'] . '</p>
                        </li>';
                    }
                }
            ?>
                <li style="text-align:center;background:rgba(255,255,255,0.4); color:black;border:1px solid black;border-radius:100deg;">
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
                </li>
            </ul>
        </div>
    </main>

</body>

</html>