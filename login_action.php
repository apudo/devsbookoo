<?php
require 'config.php';
require 'models/Auth.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

$password = filter_input(INPUT_POST, 'password');


if($email && $password){
    
    
    $auth = new Auth($pdo, $base);

    if($auth->validateLogin($email, $password)){
        echo '<pre>'; print_r($email.'-'.$password); echo '</pre>';exit; 
        header("Location: ".$base);
        exit;
    }

}
$_SESSION['flash'] = 'E-mail e/ou senha inválidos.';
header("Location: ".$base."/login.php");
