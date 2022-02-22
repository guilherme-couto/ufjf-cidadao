<?php

if (isset($_POST["submit"])) {

    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    require_once 'connection.php';
    require_once 'functions.php';

    if (emptyInputLogIn($cpf, $senha) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $cpf, $senha);
}
else {
    header("location: ../login.php");
    exit();
}
