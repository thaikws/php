<h3 class="mt-3 text-primary">
    Fornecedor
</h3>

<div class="card shadow mt-3">

    <form method="post"
          name="formsalvar"
          id="formSalvar"
          class="m-3">

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
                       placeholder="Nome do fornecedor"
                       required>

            </div>

        </div>

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
                       placeholder="Empresa"
                       required>

            </div>

        </div>

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
                       placeholder="Função"
                       required>

            </div>

        </div>

        <div class="form-group row">

            <div class="col-sm-10">

                <input type="submit"
                       class="btn btn-primary"
                       name="btnsalvar"
                       value="Cadastrar">

            </div>

            <a href="?p=fornecedores"
               class="btn btn-danger">
                Cancelar
            </a>

        </div>

    </form>

</div>

<?php

if (filter_input(INPUT_POST, 'btnsalvar')) {

    require_once __DIR__ .
        '/../../controller/FornecedorController.php';

    $fornecedor = new FornecedorController();

    if ($fornecedor->salvar()) {

?>

        <div class="alert alert-primary mt-3"
             role="alert">

            Fornecedor cadastrado com sucesso!

        </div>

        <meta hidden
              http-equiv="refresh"
              content="0.2;URL=?p=fornecedores">

<?php

    } else {

?>

        <div class="alert alert-danger mt-3"
             role="alert">

            Erro ao cadastrar fornecedor!

        </div>

<?php

    }

}

?>
