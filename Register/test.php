<?php 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $username=$_POST['username'];
    $password2=$_POST['con-password'];
    if($email==null || $password == null || $username==null ||$password2==null){
        echo 'Trebuie sa introduceti toate valorile <br>';
    }else if($password!=$password2){
        echo 'Parolele nu corespund <br>';
    }else{
        echo 'Emailul dvs este: ' . $email . ' <br> Usernameul dvs este: ' . $username . 
        ' <br> iar parola dvs este: ' . $password . ' <br> parola2: '  . $password2;
    }

?>