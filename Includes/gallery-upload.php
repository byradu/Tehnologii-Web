<?php 
    if(isset($_POST['submit'])){
        $title=$_POST['filetitle'];
        if(empty($title)){
            $title="gallery";
        }else{
            $title=strtolower(str_replace(" ","-",$title));
        }
        $valoare=$_POST['valoare'];
        $tara=$_POST['tara'];
        $createdAt=$_POST['createdAt'];
        $descriere=$_POST['descriere'];
        // echo $title . "," .  $createdAt . "," . $valoare . "," . $tara . "," . $descriere;
        //$_Files- array de iteme uploadate prin POST
        $file=$_FILES['file'];
        // luam datele despre fisierul uploadat
        $fileName=$file["name"];
        $fileType=$file["type"];
        $fileTempName=$file["tmp_name"];
        $fileError=$file["error"];
        $fileSize=$file["size"];
        // verificam extensia fisierului
        $fileExt=explode(".",$fileName);
        // ma duc la ultimul element din stringu splituit, pentru ca ultimele litere dupa . sunt de fapt extensia fisierului
        $fileActualExt=strtolower(end($fileExt));
        // array pentru extensiile permise
        $allowed=array("jpg","jpeg","png");
        if(in_array($fileActualExt,$allowed)){
            if($fileError===0){
                if($fileSize<2000000){
                    // generez id unic ca sa nu fie mai multe imagini cu acelasi path
                    $imageFullName=$title . "." .uniqid("",true) . "." . $fileActualExt;
                    $fileDestination="../Gallery/images/" .$imageFullName;
                    include_once "connection.inc.php";
                    if(empty($title) || empty($descriere)){
                        header("Location:../Gallery/gallery.php?upload=empty");
                        exit();
                    }else{
                        $stmt=mysqli_stmt_init($conn);
                        $sql="INSERT INTO coins(title,value,country,createdAt, description, imgFullName) VALUES (?,?,?,?,?,?)";
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo"SQL Error";
                        }else{
                            mysqli_stmt_bind_param($stmt,"sissss",$title,$valoare,$tara,$createdAt,$descriere,$imageFullName);
                            mysqli_stmt_execute($stmt);
                            // cand e uploadat, fisierul are o durata de viata temporara, il mutam intr un folder pentru a fi incarcat mai tarziu in galerie dintr-un select
                            move_uploaded_file($fileTempName,$fileDestination);
                            header("Location:../Gallery/gallery.php?upload=success");
                        }
                    }
                }
            }
        }
        
    }

?>