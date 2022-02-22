<?php
    include_once './header.php';
?>

<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="./static/logo-ufjf.png" alt="" width="72" height="57">
    <?php
          if (isset($_SESSION["nome"])) {
            echo "<h1 class='display-5 fw-bold'>Olá, " . $_SESSION["nome"] . "!</h1>";
          }
          else {
            echo "<h1 class='display-5 fw-bold'>UFJF Cidadão</h1>";
          }
        ?>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Projeto desenvolvido na disciplina de Banco de Dados. O intuito é servir como uma plataforma que facilite a interação e o gerenciamento dos projetos de extensão da UFJF.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        
        <a href='login.php' class='btn btn-outline-secondary btn-lg px-4'>Log in</a>
            <a href='signup-menu.php' class='btn btn-primary btn-lg px-4 gap-3'>Registrar-se</a>
      </div>
    </div>
  </div>

<?php
    include_once './footer.php';
?>