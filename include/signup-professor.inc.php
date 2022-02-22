<?php

if (isset($_POST["submit"])) {
    
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf = $_POST["cpf"];
    $matricula = $_POST["matricula"];
    $tipo = $_POST["tipo"];
    $departamento = $_POST["departamento"];
    $senha = $_POST["senha"];
    $senharepetida = $_POST["senharepetida"];

    require_once 'connection.php';
    require_once 'functions.php';
    
    //error handlers 
    
    if (emptyInputSignUpProfessor($nome, $sobrenome, $cpf, $matricula, $tipo, $departamento, $senha, $senharepetida) !== false) {
        header("location: ../signup-professor.php?error=emptyinput");
        exit();
    }
    
    if (cpfExists($conn, $cpf) !== false) {
        header("location: ../signup-professor.php?error=cpftaken");
        exit();
    }

    if (pwdMatch($senha, $senharepetida) !== false) {
        header("location: ../signup-professor.php?error=pwderror");
        exit();
    }

    creatProfessor($conn, $nome, $sobrenome, $cpf, $matricula, $tipo, $departamento, $senha);
}
else {
    header("location: ../signup-professor.php");
    exit();
}