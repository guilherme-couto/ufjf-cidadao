<?php

if (isset($_POST["submit"])) {
    
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $idade = $_POST["idade"];
    $senha = $_POST["senha"];
    $senharepetida = $_POST["senharepetida"];

    require_once 'connection.php';
    require_once 'functions.php';
    
    //error handlers 
    
    if (emptyInputSignUpCidadao($nome, $sobrenome, $cpf, $email, $idade, $endereco, $senha, $senharepetida) !== false) {
        header("location: ../signup-cidadao.php?error=emptyinput");
        exit();
    }
    
    if (cpfExists($conn, $cpf) !== false) {
        header("location: ../signup-cidadao.php?error=cpftaken");
        exit();
    }

    if (pwdMatch($senha, $senharepetida) !== false) {
        header("location: ../signup-cidadao.php?error=pwderror");
        exit();
    }
    
    creatCidadao($conn, $nome, $sobrenome, $cpf, $endereco, $email, $idade, $senha);
}
else {
    header("location: ../signup-cidadao.php");
    exit();
}