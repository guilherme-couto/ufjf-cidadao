<?php

if (isset($_POST["submit"])) {
    
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf = $_POST["cpf"];
    $matricula = $_POST["matricula"];
    $senha = $_POST["senha"];
    $senharepetida = $_POST["senharepetida"];

    require_once 'connection.php';
    require_once 'functions.php';
    
    //error handlers 
    
    if (emptyInputSignUpParticipante($nome, $sobrenome, $cpf, $matricula, $senha, $senharepetida) !== false) {
        header("location: ../signup-estudante.php?error=emptyinput");
        exit();
    }
    
    if (cpfExists($conn, $cpf) !== false) {
        header("location: ../signup-estudante.php?error=cpftaken");
        exit();
    }

    if (pwdMatch($senha, $senharepetida) !== false) {
        header("location: ../signup-estudante.php?error=pwderror");
        exit();
    }

    creatParticipante($conn, $nome, $sobrenome, $cpf, $matricula, $senha);
}
else {
    header("location: ../signup-estudante.php");
    exit();
}