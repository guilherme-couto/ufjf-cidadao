<?php
session_start();


if (isset($_POST["submit"])) {
    
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $publico = $_POST["publico"];
    $local = $_POST["local"];
    $datainicio = $_POST["datainicio"];
    $datatermino = $_POST["datatermino"];
    $site = $_POST["site"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $comointeragir = $_POST["comointeragir"];
    $nome_servico = $_POST["servico"];
    $nome_categoria = $_POST["categoria"];
    $id_professor_responsavel = $_SESSION["id"];

    require_once 'connection.php';
    require_once 'functions.php';
    
    //error handlers 
    
    if (emptyInputCadastrarProjeto($nome, $descricao, $publico, $local, $datainicio, $datatermino, $site, $telefone, $email, $comointeragir, $nome_servico, $nome_categoria) !== false) {
        header("location: ../cadastrar-projeto.php?error=emptyinput");
        exit();
    }

    creatProjeto($conn, $nome, $descricao, $publico, $local, $datainicio, $datatermino, $site, $telefone, $email, $comointeragir, $nome_servico, $nome_categoria, $id_professor_responsavel);
}
else {
    header("location: ../cadastrar-projeto.php");
    exit();
}