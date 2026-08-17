  <?php
    $id = filter_input(INPUT_GET, 'id');

    if ($id) {
        include_once '../model/Cliente-copia.php';
        $cat = new Cliente();
        $cat->setId($id);

        if ($cat->excluir()) {
    ?>
            <div class="alert alert-primary" role="alert">
                Excluído com sucesso
            </div>
    <?php
        }
    }
    ?>
    <meta http-equiv="refresh" CONTENT="0.2;URL=?p=clientes">