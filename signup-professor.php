<?php
    include_once './header.php';
?>

<div class="sign-form text-center">
    
<main class="form-signin">
  <form action="include/signup-professor.inc.php" method="post">
    <img class="mb-4" src="./static/logo-ufjf.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Registrar</h1>

    <div class="form-floating">
      <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Nome">
      <label for="floatingInput">Nome</label>
    </div>
    <div class="form-floating">
      <input type="text" name="sobrenome" class="form-control" id="floatingInput" placeholder="Sobrenome">
      <label for="floatingInput">Sobrenome</label>
    </div>
    <div class="form-floating">
      <input type="text" name="cpf" class="form-control" id="floatingInput" placeholder="CPF">
      <label for="floatingInput">CPF</label>
    </div>
    <div class="form-floating">
      <input type="text" name="matricula" class="form-control" id="floatingInput" placeholder="Matrícula">
      <label for="floatingInput">Matrícula</label>
    </div>
    <div class="form-floating">
      <input type="text" name="tipo" class="form-control" id="floatingInput" placeholder="Tipo de Dedicação">
      <label for="floatingInput">Tipo de Dedicação</label>
    </div>
    <div class="form-floating">
      <input type="text" name="departamento" class="form-control" id="floatingInput" placeholder="Departamento">
      <label for="floatingInput">Departamento</label>
    </div>
    <div class="form-floating">
      <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Senha">
      <label for="floatingPassword">Senha</label>
    </div>
    <div class="form-floating">
      <input type="password" name="senharepetida" class="form-control" id="floatingPassword" placeholder="Repetir senha">
      <label for="floatingPassword">Repetir senha</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Lembrar de mim
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Registrar</button>
    <p class="mt-5 mb-3 text-muted">© 2022</p>
  </form>

  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p>Todos os campos precisam ser preenchidos</p>";
    }
    else if ($_GET["error"] == "cpftaken") {
      echo "<p>CPF já registrado</p>";
    }
    else if ($_GET["error"] == "pwderror") {
      echo "<p>As senhas não correspondem</p>";
    }
    else if ($_GET["error"] == "stmtfailed") {
      echo "<p>Something went wrong</p>";
    }
    else if ($_GET["error"] == "none") {
      echo "<p style='color:green;'>Registrado com sucesso</p>";
    }
  }
?>

</main>

</div>


<?php
    include_once './footer.php';
?>