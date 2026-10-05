<?php

$id = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

if (!$id) {
    echo '<div class="alert alert-danger mt-3">
            Cliente inválido.
          </div>';
    return;
}

require_once __DIR__ .
    '/../../controller/ClienteController.php';

$controller = new ClienteController();

$cliente = $controller->buscarPorId($id);

if (!$cliente) {
    echo '<div class="alert alert-danger mt-3">
            Cliente não encontrado.
          </div>';
    return;
}

?>

<h3 class="mt-3 text-primary">
    Editar Cliente
</h3>

<div class="card shadow mt-3">

    <form method="post"
          name="formalterar"
          id="formAlterar"
          class="m-3">

        <input type="hidden"
               name="txtid"
               value="<?= $cliente->getId() ?>">

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
                       value="<?= htmlspecialchars($cliente->getNome()) ?>"
                       placeholder="Nome do cliente"
                       required>

            </div>

        </div>

        <div class="form-group row">

            <label for="txtemail"
                   class="col-sm-2 col-form-label">
                Email
            </label>

            <div class="col-sm-10">

                <input type="email"
                       class="form-control"
                       id="txtemail"
                       name="txtemail"
                       value="<?= htmlspecialchars($cliente->getEmail()) ?>"
                       placeholder="Email do cliente"
                       required>

            </div>

        </div>

        <div class="form-group row">

            <div class="col-sm-10">

                <input type="submit"
                       class="btn btn-primary"
                       name="btnalterar"
                       value="Alterar">

                <a href="?p=clientes"
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

            Cliente alterado com sucesso!

        </div>

        <meta hidden
              http-equiv="refresh"
              content="0.5;URL=?p=clientes">

<?php

    } else {

?>

        <div class="alert alert-danger mt-3"
             role="alert">

            Erro ao alterar cliente!

        </div>

<?php

    }

}

?>
