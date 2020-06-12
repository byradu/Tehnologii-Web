<?php
session_start();
include_once '../Includes/connection.inc.php';

$sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . ";";
if (isset($_POST['ordDesc'])) {
    if ($_POST['ordDesc'] == "true") {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by INVENTORY.id DESC";
    }
}
if (isset($_POST['ordAsc'])) {
    if ($_POST['ordAsc'] == "true") {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by INVENTORY.id ASC";
    }
}
if (isset($_POST['taraAsc'])) {
    if ($_POST['taraAsc'] == "true") {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country ASC";
    }
}
if (isset($_POST['taraDesc'])) {
    if ($_POST['taraDesc'] == "true") {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country DESC";
    }
}
if (isset($_POST['valueDesc'])) {
    if ($_POST['valueDesc'] == "true") {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by value DESC";
    }
}
if (isset($_POST['valueAsc'])) {
    if ($_POST['valueAsc'] == "true") {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by value ASC";
    }
}
if (isset($_POST['ordAsc']) && isset($_POST['taraAsc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['taraAsc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by INVENTORY.id ASC,country asc";
    }
}
if (isset($_POST['ordAsc']) && isset($_POST['taraDesc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['taraAsc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by INVENTORY.id ASC,country DESC";
    }
}
if (isset($_POST['ordDesc']) && isset($_POST['taraDesc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['taraAsc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by INVENTORY.id DESC,country DESC";
    }
}
if (isset($_POST['ordDesc']) && isset($_POST['taraAsc'])) {
    if ($_POST['ordDesc'] == "true" && $_POST['taraAsc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by INVENTORY.id DESC,country ASC";
    }
}
if (isset($_POST['ordAsc']) && isset($_POST['valueAsc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['valueAsc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by INVENTORY.id ASC,value ASC";
    }
}
if (isset($_POST['ordAsc']) && isset($_POST['valueDesc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['valueDesc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by INVENTORY.id ASC,value ASC";
    }
}
if (isset($_POST['taraAsc']) && isset($_POST['valueDesc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['valueDesc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country asc,value desc";
    }
}
if (isset($_POST['taraAsc']) && isset($_POST['valueAsc'])) {
    if ($_POST['ordAsc'] == "true" && $_POST['valueAsc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country asc,value asc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueAsc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country desc,value asc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueDesc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country desc,value desc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueDesc']) && isset($_POST['ordAsc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true && $_POST['ordAsc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country desc,value desc,1 asc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueDesc']) && isset($_POST['ordDesc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true && $_POST['ordDesc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country desc,value desc,1 desc";
    }
}
if (isset($_POST['taraAsc']) && isset($_POST['valueDesc']) && isset($_POST['ordDesc'])) {
    if ($_POST['taraAsc'] == "true" && $_POST['valueAsc'] == true && $_POST['ordDesc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country ASC,value desc,1 desc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueDesc']) && isset($_POST['ordDesc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueDesc'] == true && $_POST['ordDesc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country DESC,value desc,1 desc";
    }
}
if (isset($_POST['taraDesc']) && isset($_POST['valueAsc']) && isset($_POST['ordDesc'])) {
    if ($_POST['taraDesc'] == "true" && $_POST['valueAsc'] == true && $_POST['ordDesc'] == true) {
        $sql = "select inventory.id as iid,coins.id as cid,title,value,country,createdAt,description,imgFullName,reversePic
        from inventory,coins where inventory.id_coin=coins.id and inventory.id_user=" . $_SESSION['ID'] . " order by country DESC,value asc,1 desc";
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
        $raspuns=$raspuns . '<div style="font-size:1.5em;"><p style="color: #25f54f;letter-spacing:1px;" >Momentan colectia dumneavoastra nu contine nimic. <a href="gallery.php" style="text-decoration:none;color: #25f54f;" class="curcubeu">Apasati aici pentru a putea incepe sa va creati propria colectie!</a></p></div><style>.sortare{visibility:hidden;}</style>';
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $raspuns = $raspuns . '<li style="text-align:center;background:white; color:black;border:1px solid black;margin:0.4em; padding:0.1em;max-width:400px;">

            <div style="background:white;"><img style="height:120px;width:120px;" src="images/' . $row["imgFullName"] . '"> <img style="height:120px;width:120px;"  src="images/' . $row["reversePic"] . '"></div>
            <p style="max-width:300px;">Title: ' . $row['title'] . '</p>
            <p>Value: ' . $row['value'] . '</p>
            <p>Country: ' . $row['country'] . '</p>
            <p>Created at: ' . $row['createdAt'] . '</p>
            <p style="max-width:300px;">Description: ' . $row['description'] . '</p>';
            $raspuns = $raspuns . '<form action="my_collection.php?action=remove&id=' . $row['iid'] . '" method="POST">
                <button type="submit" class="btn-inventory"  name="remove-inventory" style="">Elimina din colectie</button></form></li>';
        }
    }

    echo $raspuns;
}
