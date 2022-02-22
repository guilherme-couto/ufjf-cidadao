<?php
    include_once './header-logado.php';
?>
    
    <div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom text-center">Menu Projetos</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      
    <?php

    if (isset($_SESSION["id"])) {
        require_once './include/connection.php';

        $sql = "SELECT id, nome, descricao, publico, data_inicio, id_categoria FROM projeto ORDER BY data_inicio ASC;";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $sql_categoria = "SELECT nome FROM categoria WHERE id = ?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql_categoria)) {
                    header("location: ../login.php?error=stmtfailed");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "i", $row['id_categoria']);
                mysqli_stmt_execute($stmt);
                $categoria = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
                mysqli_stmt_close($stmt);

                echo "<div class='col d-flex align-items-start'>
                        <div class='icon-square bg-light text-dark flex-shrink-0 me-3'>
                            <svg class='bi' width='1em' height='1em'><use xlink:href='#toggles2'></use></svg>
                        </div>
                        <div>
                            <h2>" . $row['nome'] . "</h2>
                            <h5> Categoria: " . $categoria['nome'] . "</h5>
                            <h5> Publico: " . $row['publico'] . "</h5>
                            <h6> Data de início: " . $row['data_inicio'] . "</h6>
                            <p>" . $row['descricao'] . "</p>
                            <a href='#' class='btn btn-primary'>Ver detalhes</a>
                        </div>
                    </div>";
            }
        }
    }

      
    ?>

    </div>
  </div>

<?php
    include_once './footer.php';
?>