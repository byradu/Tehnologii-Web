<?php 
    $email=$_POST['email'];
    $password=$_POST['password'];
    if($email==null || $password == null){
        echo 'Trebuie sa introduceti ambele valori <br>';
    }else{
        echo 'Emailul dvs este: ' . $email . ' iar parola dvs este: ' . $password ;
    }

?>