<?php
    include_once './header-logado.php';
?>

<div class="sign-form text-center">
    
<main class="form-signin">
  <form action="include/cadastrar-projeto.inc.php" method="post">
    <img class="mb-4" src="./static/logo-ufjf.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Cadastrar Novo Projeto</h1>

    <div class="form-floating">
      <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Nome">
      <label for="floatingInput">Nome</label>
    </div>
    <div class="form-floating">
      <input type="text" name="descricao" class="form-control" id="floatingInput" placeholder="Descricao">
      <label for="floatingInput">Descricao</label>
    </div>
    <div class="form-floating">
      <input type="text" name="publico" class="form-control" id="floatingInput" placeholder="Publico">
      <label for="floatingInput">Publico</label>
    </div>
    <div class="form-floating">
      <input type="text" name="local" class="form-control" id="floatingInput" placeholder="Local">
      <label for="floatingInput">Local</label>
    </div>
    <div class="form-floating">
      <input type="date" name="datainicio" class="form-control" id="floatingInput" placeholder="Data de Inicio">
      <label for="floatingInput">Data de Inicio</label>
    </div>
    <div class="form-floating">
      <input type="date" name="datatermino" class="form-control" id="floatingInput" placeholder="Data de Termino">
      <label for="floatingInput">Data de Termino</label>
    </div>
    <div class="form-floating">
      <input type="text" name="site" class="form-control" id="floatingInput" placeholder="Site">
      <label for="floatingInput">Site</label>
    </div>
    <div class="form-floating">
      <input type="text" name="telefone" class="form-control" id="floatingInput" placeholder="Telefone">
      <label for="floatingInput">Telefone</label>
    </div>
    <div class="form-floating">
      <input type="text" name="email" class="form-control" id="floatingInput" placeholder="Email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="text" name="comointeragir" class="form-control" id="floatingInput" placeholder="Como Interagir">
      <label for="floatingInput">Como interagir</label>
    </div>
    <div class="form-floating">
      <input type="text" name="servico" class="form-control" id="floatingInput" placeholder="Servico">
      <label for="floatingInput">Tipo de serviço</label>
    </div>
    <div class="form-floating">
      <input type="text" name="categoria" class="form-control" id="floatingInput" placeholder="Categoria">
      <label for="floatingInput">Categoria</label>
    </div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Cadastrar</button>
    <p class="mt-5 mb-3 text-muted">© 2022</p>
  </form>

  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p>Todos os campos precisam ser preenchidos</p>";
    }
    else if ($_GET["error"] == "stmtfailed") {
      echo "<p>Something went wrong</p>";
    }
    else if ($_GET["error"] == "none") {
      echo "<p style='color:green;'>Projeto cadastrado com sucesso</p>";
    }
  }
?>

</main>

</div>


<?php
    include_once './footer.php';
?>