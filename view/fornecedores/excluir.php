<?php

$id = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

if ($id) {

    require_once __DIR__ .
        '/../../controller/FornecedorController.php';

    $fornecedor = new FornecedorController();

    if ($fornecedor->excluir($id)) {

?>

        <div class="alert alert-primary"
             role="alert">

            Fornecedor excluído com sucesso!

        </div>

<?php

    } else {

?>

        <div class="alert alert-danger"
             role="alert">

            Erro ao excluir fornecedor!

        </div>

<?php

    }

}

?>

<meta http-equiv="refresh"
      content="0.2;URL=?p=fornecedores">
