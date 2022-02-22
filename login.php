<?php
    include_once './header.php';
?>

<div class="sign-form text-center">
    
<main class="form-signin">
  <form action="include/login.inc.php" method="post">
    <img class="mb-4" src="./static/logo-ufjf.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Log In</h1>

    <div class="form-floating">
      <input type="text" name="cpf" class="form-control" id="floatingInput" placeholder="CPF">
      <label for="floatingInput">CPF</label>
    </div>
    <div class="form-floating">
      <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Senha">
      <label for="floatingPassword">Senha</label>
    </div>


    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Log In</button>
    <p class="mt-5 mb-3 text-muted">© 2022</p>
  </form>

  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p>Todos os campos precisam ser preenchidos</p>";
    }
    else if ($_GET["error"] == "wronglogin") {
      echo "<p>CPF e/ou senha invalidos</p>";
    }
  }
?>

</main>
</div>

<?php
    include_once './footer.php';
?>