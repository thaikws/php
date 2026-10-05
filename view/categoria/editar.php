<?php

$id = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

if (!$id) {

    echo '
        <div class="alert alert-danger mt-3">
            Categoria inválida.
        </div>
    ';

    return;
}

require_once __DIR__ .
    '/../../controller/CategoriaController.php';

$controller = new CategoriaController();

$categoria = $controller->buscarPorId($id);

if (!$categoria) {

    echo '
        <div class="alert alert-danger mt-3">
            Categoria não encontrada.
        </div>
    ';

    return;
}

?>

<h3 class="mt-3 text-primary">
    Editar Categoria
</h3>

<div class="card shadow mt-3">

    <form method="post"
          name="formalterar"
          id="formAlterar"
          class="m-3">

        <!-- ID da categoria -->
        <input type="hidden"
               name="txtid"
               value="<?= $categoria->getId() ?>">


        <!-- NOME -->

        <div class="form-group row">

            <label for="txtnome"
                   class="col-sm-2 col-form-label">

                Nome

            </label>

            <div class="col-sm-10">

                <input type="text"
                       class="form-control"
                       id="txtnome"
                       name="txtnome"
                       value="<?= htmlspecialchars($categoria->getNome()) ?>"
                       placeholder="Nome da categoria"
                       required>

            </div>

        </div>


        <!-- INFORMAÇÕES -->

        <div class="form-group row">

            <label for="txtinformacoes"
                   class="col-sm-2 col-form-label">

                Informações

            </label>

            <div class="col-sm-10">

                <textarea
                    class="form-control"
                    id="txtinformacoes"
                    name="txtinformacoes"
                    rows="5"
                    placeholder="Informações da categoria"
                    required><?= htmlspecialchars($categoria->getInformacoes()) ?></textarea>

            </div>

        </div>


        <!-- BOTÕES -->

        <div class="form-group row">

            <div class="col-sm-10">

                <input type="submit"
                       class="btn btn-primary"
                       name="btnalterar"
                       value="Alterar">

                <a href="?p=categorias"
                   class="btn btn-danger">

                    Cancelar

                </a>

            </div>

        </div>

    </form>

</div>


<?php

if (filter_input(INPUT_POST, 'btnalterar')) {

    if ($controller->alterar()) {

?>

        <div class="alert alert-primary mt-3"
             role="alert">

            Categoria alterada com sucesso!

        </div>

        <meta hidden
              http-equiv="refresh"
              content="0.5;URL=?p=categorias">

<?php

    } else {

?>

        <div class="alert alert-danger mt-3"
             role="alert">

            Erro ao alterar categoria!

        </div>

<?php

    }

}

?>
