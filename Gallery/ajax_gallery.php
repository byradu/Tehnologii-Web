<?php
session_start();
include_once '../Includes/connection.inc.php';

$sql = "SELECT * FROM COINS";
if (isset($_POST['ordDesc'])) {
    if ($_POST['ordDesc'] == "true") {
        echo '<script>console.log("desc");</script>';
        $sql = "SELECT * FROM COINS order by 1 DESC";
    }
}
if (isset($_POST['ordAsc'])) {
    if ($_POST['ordAsc'] == "true") {
        $sql = "SELECT * FROM COINS order by 1 asc";
    }
}
if (isset($_POST['taraAsc'])) {
    if ($_POST['taraAsc'] == "true") {
        $sql = "SELECT * FROM COINS order by country DESC";
    }
}
if (isset($_POST['taraDesc'])) {
    if ($_POST['taraDesc'] == "true") {
        $sql = "SELECT * FROM COINS order by country ASC";
    }
}
if (isset($_POST['valueDesc'])) {
    if ($_POST['valueDesc'] == "true") {
        $sql = "SELECT * FROM COINS ORDER BY value DESC";
    }
}
if (isset($_POST['valueAsc'])) {
    if ($_POST['valueAsc'] == "true") {
        $sql = "SELECT * FROM COINS ORDER BY value ASC";
    }
}
if (isset($_POST['ordAsc']) && isset($_POST['taraAsc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['taraAsc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY id ASC, country asc";
    }
}
if (isset($_POST['ordAsc']) && isset($_POST['taraDesc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['taraAsc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY id ASC,country desc";
    }
}
if (isset($_POST['ordDesc']) && isset($_POST['taraDesc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['taraAsc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY id desc, country desc";
    }
}
if (isset($_POST['ordDesc']) && isset($_POST['taraAsc'])) {
    if ($_POST['ordDesc'] == "true" && $_POST['taraAsc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY id desc, country asc";
    }
}
if (isset($_POST['ordAsc']) && isset($_POST['valueAsc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['valueAsc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY id asc, country asc";
    }
}
if (isset($_POST['ordAsc']) && isset($_POST['valueDesc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['valueDesc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY id asc, country desc";
    }
}
if (isset($_POST['taraAsc']) && isset($_POST['valueDesc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['valueDesc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY country asc, value desc";
    }
}
if (isset($_POST['taraAsc']) && isset($_POST['valueAsc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['valueAsc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY country asc, value asc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueAsc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY country desc, value asc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueDesc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY country desc, value desc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueDesc']) && isset($_POST['ordAsc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true && $_POST['ordAsc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY country desc,value desc , id asc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueDesc']) && isset($_POST['ordDesc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true && $_POST['ordDesc'] == true) {
        $sql = "SELECT * FROM COINS ORDER BY country desc,value asc , id desc";
    }
}
if (isset($_POST['taraAsc']) && isset($_POST['valueDesc']) && isset($_POST['ordDesc'])) {
    if ($_POST['taraAsc'] == "true" && $_POST['valueAsc'] == true && $_POST['ordDesc'] == true) {
        $sql="SELECT * FROM COINS ORDER BY country asc,value desc , id desc";

    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueDesc']) && isset($_POST['ordDesc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueDesc'] == true && $_POST['ordDesc'] == true) {
        $sql="SELECT * FROM COINS ORDER BY country desc,value desc , id desc";

    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueAsc']) && isset($_POST['ordDesc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true && $_POST['ordDesc'] == true) {
        $sql="SELECT * FROM COINS ORDER BY country desc,value asc , id desc";

    }
}
$raspuns = "";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo 'nuu';
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!mysqli_num_rows($result)) {
        $raspuns = $raspuns . '<div style="font-size:1.5em;"><p style="color: #25f54f;letter-spacing:1px;" >Momentan colectia dumneavoastra nu contine nimic. <a href="gallery.php" style="text-decoration:none;color: #25f54f;" class="curcubeu">Apasati aici pentru a putea incepe sa va creati propria colectie!</a></p></div><style>.sortare{visibility:hidden;}</style>';
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $raspuns = $raspuns . '<li style="text-align:center;background:rgba(255,255,255,0.4); color:black;border:1px solid black;margin:0.5em;max-width:400px;">
                        
                        
            <div style="background:white;"><img style="height:120px;width:120px;" src="images/' . $row["imgFullName"] . '"> <img style="height:120px;width:120px;"  src="images/' . $row["reversePic"] . '"></div>
            <p style="max-width:300px;">Title: ' . $row['title'] . '</p>
            <p>Value: ' . $row['value'] . '</p>
            <p>Country: ' . $row['country'] . '</p>
            <p>Created at: ' . $row['createdAt'] . '</p> 
            <p style="max-width:300px;">Description: ' . $row['description'] . '</p>';
            if (isset($_SESSION['username'])) {
                if ($_SESSION['username'] == "admin") {
                    $raspuns=$raspuns . '<style>
                        .galerie{
                            margin-top:18vh;
                        }
                    </style>';
                }elseif ($_SESSION['username'] != "admin") { /* action="../Includes/insert.php?action=add&id=' . $row['id'] . '" */
                    $raspuns=$raspuns . '<style>
                    .galerie{
                        margin-top:10vh;
                    }
                </style>';
                    $raspuns=$raspuns . '<form method="POST" id= "insert">
                    <button type="button" class="btn-inventory"  name="submit-inventory" data-id="' . $row['id'] . '" 
                    onclick="insert_post('.$row['id'].')">Adauga in colectie</button></form></li>';
                }
            }
        }

        echo $raspuns;
    }
}
