<?php 
    if (isset($_POST['submit'])) {
        if (count($_FILES['file']["tmp_name"])==2) {
            // array pentru extensiile permise
            $allowed=array("jpg","jpeg","png");
            $title=$_POST['filetitle'];
            if (empty($title)) {
                $title="gallery";
            } else {
                $title=strtolower(str_replace(" ", "-", $title));
            }
            $valoare=$_POST['valoare'];
            $tara=$_POST['tara'];
            $createdAt=$_POST['createdAt'];
            $descriere=$_POST['descriere'];

            // luam datele despre fisierele uploadate
            $fileName=$_FILES['file']["name"][0];
            $fileType=$_FILES['file']["type"][0];
            $fileTempName=$_FILES['file']["tmp_name"][0];
            $fileError=$_FILES['file']["error"][0];
            $fileSize=$_FILES['file']["size"][0];
            $fileName1=$_FILES['file']["name"][1];
            $fileType1=$_FILES['file']["type"][1];
            $fileTempName1=$_FILES['file']["tmp_name"][1];
            $fileError1=$_FILES['file']["error"][1];
            $fileSize1=$_FILES['file']["size"][1];
            // verificam extensia fisierelor
            $fileExt=explode(".", $fileName);
            $fileExt1=explode(".", $fileName1);
            // ma duc la ultimul element din stringu splituit, pentru ca ultimele litere dupa . sunt de fapt extensia fisierului
            $fileActualExt=strtolower(end($fileExt));
            $fileActualExt1=strtolower(end($fileExt1));


            
            if (in_array($fileActualExt, $allowed) && in_array($fileActualExt1,$allowed)) {
                if (($fileError===0) && ($fileError1===0)) {
                    if ($fileSize<5000000 && $fileSize1<5000000) {
                        // generez id unic ca sa nu fie mai multe imagini cu acelasi path
                        $imageFullName=$title . "." .uniqid("", true) . "." . $fileActualExt;
                        $imageFullName1=$title . "." .uniqid("", true) . "." . $fileActualExt1;
                        $fileDestination="../Gallery/images/" .$imageFullName;
                        $fileDestination1="../Gallery/images/" .$imageFullName1;
                        include_once "connection.inc.php";
                        if (empty($title) || empty($descriere)) {
                            header("Location:../Gallery/gallery.php?upload=empty");
                            exit();
                        } else {
                            $stmt=mysqli_stmt_init($conn);
                            $sql="INSERT INTO coins(title,value,country,createdAt, description, imgFullName,reversePic) VALUES (?,?,?,?,?,?,?)";
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo"SQL Error";
                            } else {
                                mysqli_stmt_bind_param($stmt, "sisssss", $title, $valoare, $tara, $createdAt, $descriere, $imageFullName,$imageFullName1);
                            
                                mysqli_stmt_execute($stmt);
                               
                                // cand e uploadat, fisierul are o durata de viata temporara, il mutam intr un folder pentru a fi incarcat mai tarziu in galerie dintr-un select
                                move_uploaded_file($fileTempName, $fileDestination);
                                move_uploaded_file($fileTempName1, $fileDestination1);
                                echo 'te rog final';
                                header("Location:../Gallery/gallery.php?upload=success");
                            }
                        }
                    }else{
                        header("Location:../Gallery/gallery.php?filesizeTooBig");

                    }
                }else{
                    header("Location:../Gallery/gallery.php?uploaderror");

                }
            }
        }else{
            header("Location:../Gallery/gallery.php?uploadonly2files");
        }
    }
