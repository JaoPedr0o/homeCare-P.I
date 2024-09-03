<?php 
require 'config.php';

if(isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['email']) == 0){
        echo "Preencha seu E-mail!";
    } else if(strlen($_POST['email']) == 0){
        echo "Preencha sua senha!";
    }else{
        $email = $msqli->real_escape_string($_POST['email']);
        $email = $msqli->real_escape_string($_POST['email']);
    }
}
?>