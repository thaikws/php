<?php

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    require_once __DIR__ . '/../../controller/CategoriaController.php';

    $cat = new CategoriaController();

    if ($cat->excluir($id)) {
?>
        <div class="alert alert-primary" role="alert">
            Excluído com sucesso
        </div>
<?php
    }
}
?>

<meta http-equiv="refresh" content="0.2;URL=?p=categorias">
