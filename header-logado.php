<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./static/styles.css" />
    
    <title>UFJF Cidadão</title>
  </head>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="menu-projetos.php" class="nav-link px-2 link-secondary">Menu Projetos</a></li>

        <?php
            if ($_SESSION["profile"] === "participante") {
                echo "<li><a href='participacoes.php' class='nav-link px-2 link-dark'>Participações</a></li>";
            }
            else if($_SESSION["profile"] === "cidadao") {
                echo "<li><a href='projetos-salvos.php' class='nav-link px-2 link-dark'>Projetos Salvos</a></li>";
                echo "<li><a href='interacao.php' class='nav-link px-2 link-dark'>Interações</a></li>";
            }
            else if($_SESSION["profile"] === "professor") {
                echo "<li><a href='meus-projetos.php' class='nav-link px-2 link-dark'>Meus Projetos</a></li>";
                echo "<li><a href='cadastrar-projeto.php' class='nav-link px-2 link-dark'>Cadastrar Projeto</a></li>";
                echo "<li><a href='editar-projeto.php' class='nav-link px-2 link-dark'>Editar Projeto</a></li>";
                echo "<li><a href='menu-projetos.php' class='nav-link px-2 link-dark'>Emitir Relatório</a></li>";
                echo "<li><a href='index.php' class='nav-link px-2 link-dark'>Página Inicial</a></li>";
            }
        ?>
      </ul>

      <div class="col-md-3 text-end">
        
        <?php
          if (isset($_SESSION["cpf"])) {
            echo "<a href='profile.php' class='btn btn-outline-primary me-2'>Perfil</a>";
            echo "<a href='include/logout.inc.php' class='btn btn-primary'>Sair</a>";
          }
          else {
            echo "<a href='login.php' class='btn btn-outline-primary me-2'>Log in</a>";
            echo "<a href='signup-menu.php' class='btn btn-primary'>Registrar-se</a>";
          }
        ?>

      </div>
    </header>
  </div>

  <body>
