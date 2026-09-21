<?php

$id = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

if ($id) {

    require_once __DIR__ .
        '/../../controller/ClienteController.php';

    $cliente = new ClienteController();

    if ($cliente->excluir($id)) {

?>

        <div class="alert alert-primary"
             role="alert">

            Cliente excluído com sucesso!

        </div>

<?php

    } else {

?>

        <div class="alert alert-danger"
             role="alert">

            Erro ao excluir cliente!

        </div>

<?php

    }

}

?>

<meta http-equiv="refresh"
      content="0.2;URL=?p=clientes">
