<?php

$id = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

if (!$id) {

    echo '
        <div class="alert alert-danger mt-3">
            Fornecedor inválido.
        </div>
    ';

    return;
}

require_once __DIR__ .
    '/../../controller/FornecedorController.php';

$controller = new FornecedorController();

$fornecedor = $controller->buscarPorId($id);

if (!$fornecedor) {

    echo '
        <div class="alert alert-danger mt-3">
            Fornecedor não encontrado.
        </div>
    ';

    return;
}

?>

<h3 class="mt-3 text-primary">
    Editar Fornecedor
</h3>

<div class="card shadow mt-3">

    <form method="post"
          name="formalterar"
          id="formAlterar"
          class="m-3">

        <!-- ID do fornecedor -->
        <input type="hidden"
               name="txtid"
               value="<?= $fornecedor->getId() ?>">

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
                       value="<?= htmlspecialchars($fornecedor->getNome()) ?>"
                       placeholder="Nome do fornecedor"
                       required>

            </div>

        </div>


        <!-- EMPRESA -->

        <div class="form-group row">

            <label for="txtempresa"
                   class="col-sm-2 col-form-label">

                Empresa

            </label>

            <div class="col-sm-10">

                <input type="text"
                       class="form-control"
                       id="txtempresa"
                       name="txtempresa"
                       value="<?= htmlspecialchars($fornecedor->getEmpresa()) ?>"
                       placeholder="Empresa do fornecedor"
                       required>

            </div>

        </div>


        <!-- FUNÇÃO -->

        <div class="form-group row">

            <label for="txtfuncao"
                   class="col-sm-2 col-form-label">

                Função

            </label>

            <div class="col-sm-10">

                <input type="text"
                       class="form-control"
                       id="txtfuncao"
                       name="txtfuncao"
                       value="<?= htmlspecialchars($fornecedor->getFuncao()) ?>"
                       placeholder="Função do fornecedor"
                       required>

            </div>

        </div>


        <!-- BOTÕES -->

        <div class="form-group row">

            <div class="col-sm-10">

                <input type="submit"
                       class="btn btn-primary"
                       name="btnalterar"
                       value="Alterar">

                <a href="?p=fornecedores"
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

            Fornecedor alterado com sucesso!

        </div>

        <meta hidden
              http-equiv="refresh"
              content="0.5;URL=?p=fornecedores">

<?php

    } else {

?>

        <div class="alert alert-danger mt-3"
             role="alert">

            Erro ao alterar fornecedor!

        </div>

<?php

    }

}

?>
