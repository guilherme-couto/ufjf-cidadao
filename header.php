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
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="UFJF Cidadao"><use xlink:href="./static/logo-ufjf.png"></use></svg>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
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


      