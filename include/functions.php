<?php

// ----------- SIGN UP FUNCTIONS -------------------

function emptyInputSignUpParticipante($nome, $sobrenome, $cpf, $matricula, $senha, $senharepetida) {
    $result;
    if (empty($nome) || empty($sobrenome) || empty($cpf) || empty($matricula) || empty($senha) || empty($senharepetida)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function emptyInputSignUpCidadao($nome, $sobrenome, $cpf, $email, $idade, $endereco, $senha, $senharepetida) {
    $result;
    if (empty($nome) || empty($sobrenome) || empty($cpf) || empty($idade) || empty($endereco) || empty($email) || empty($senha) || empty($senharepetida)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputSignUpProfessor($nome, $sobrenome, $cpf, $matricula, $tipo, $departamento, $senha, $senharepetida) {
    $result;
    if (empty($nome) || empty($sobrenome) || empty($cpf) || empty($matricula) || empty($departamento) || empty($tipo) || empty($senha) || empty($senharepetida)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function searchUser($conn, $cpf, $profile) {
    $sql = "SELECT * FROM `$profile` WHERE cpf = ?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $cpf);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        array_push($row, $profile);
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function cpfExists($conn, $cpf) {
    $profile = "participante";
    $row = searchUser($conn, $cpf, $profile);
    if($row === false) {
        $profile = "cidadao";
        $row = searchUser($conn, $cpf, $profile);
        if($row === false) {
            $profile = "professor";
            $row = searchUser($conn, $cpf, $profile);
            if($row === false) {
                $profile = "tecnico_proex";
                $row = searchUser($conn, $cpf, $profile);
                if($row === false) {
                    $result = false;
                    return $result;
                }
            }
        }
    }
    return $row;
}

function pwdMatch($senha, $senharepetida) {
    $result;
    if ($senha !== $senharepetida) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function creatParticipante($conn, $nome, $sobrenome, $cpf, $matricula, $senha) {
    $sql = "INSERT INTO participante (nome, sobrenome, matricula, cpf, senha) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup-estudante.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $nome, $sobrenome, $matricula, $cpf, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup-estudante.php?error=none");
    exit();
}

function creatCidadao($conn, $nome, $sobrenome, $cpf, $endereco, $email, $idade, $senha) {
    $sql = "INSERT INTO cidadao (cpf, nome, sobrenome, email, endereco, idade, senha) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup-cidadao.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $cpf, $nome, $sobrenome, $email, $endereco, $idade, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup-cidadao.php?error=none");
    exit();
}

function creatProfessor($conn, $nome, $sobrenome, $cpf, $matricula, $tipo, $departamento, $senha) {
    $sql = "INSERT INTO professor (cpf, nome, sobrenome, senha, matricula, tipo, departamento) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup-professor.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $cpf, $nome, $sobrenome, $hashedPwd, $matricula, $tipo, $departamento);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup-professor.php?error=none");
    exit();
}

// ----------------- LOG IN FUNCTIONS 

function emptyInputLogIn($cpf, $senha) {
    $result;
    if (empty($cpf) || empty($senha)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function loginUser($conn, $cpf, $senha) {
    $userExists = cpfExists($conn, $cpf);

    if ($userExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $userExists["senha"];
    $checkPwd = password_verify($senha, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["id"] = $userExists["id"];
        $_SESSION["cpf"] = $userExists["cpf"];
        $_SESSION["nome"] = $userExists["nome"];
        $_SESSION["profile"] = $userExists[0];
        header("location: ../menu-projetos.php");
        exit();
    }
}


// --------- CADASTRAR PROJETO
function emptyInputCadastrarProjeto($nome, $descricao, $publico, $local, $datainicio, $datatermino, $site, $telefone, $email, $comointeragir, $nome_servico, $nome_categoria) {
    $result;
    if (empty($nome) || empty($descricao) || empty($publico) || empty($local) || empty($datainicio) || empty($datatermino) || empty($site) || empty($telefone) || empty($email) || empty($comointeragir) || empty($nome_servico) || empty($nome_categoria)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function searchServicoID($conn, $nome_servico) {
    $sql = "SELECT id FROM servico WHERE descricao = ?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cadastrar-projeto.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $nome_servico);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        creatServico($conn, $nome_servico);
        mysqli_stmt_close($stmt);
        return searchServicoID($conn, $nome_servico);   
    }
}

function creatServico($conn, $nome_servico) {
    $sql = "INSERT INTO servico (descricao) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cadastrar-projeto.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $nome_servico);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function searchCategoriaID($conn, $nome_categoria) {
    $sql = "SELECT id FROM categoria WHERE nome = ?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cadastrar-projeto.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $nome_categoria);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        creatCategoria($conn, $nome_categoria);
        mysqli_stmt_close($stmt);
        return searchCategoriaID($conn, $nome_categoria);   
    }
}

function creatCategoria($conn, $nome_categoria) {
    $sql = "INSERT INTO categoria (nome) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cadastrar-projeto.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $nome_categoria);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function creatProjeto($conn, $nome, $descricao, $publico, $local, $datainicio, $datatermino, $site, $telefone, $email, $comointeragir, $nome_servico, $nome_categoria, $id_professor_responsavel) {
    
    $id_servico = searchServicoID($conn, $nome_servico);
    $id_categoria = searchCategoriaID($conn, $nome_categoria);
    
    $sql = "INSERT INTO projeto (nome, descricao, publico, local, data_inicio, data_termino, site, telefone, email, como_interagir, id_servico, id_categoria, id_professor_responsavel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cadastrar-projeto.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sssssssssssss", $nome, $descricao, $publico, $local, $datainicio, $datatermino, $site, $telefone, $email, $comointeragir, $id_servico['id'], $id_categoria['id'], $id_professor_responsavel);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../cadastrar-projeto.php?error=none");
    exit();
}

