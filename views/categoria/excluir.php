  <?php
    $id = filter_input(INPUT_GET, 'id');

    if ($id) {
        include_once __DIR__ . '/../../models/Categoria.php';;
        $cat = new Categoria();
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
    <meta http-equiv="refresh" CONTENT="0.2;URL=?p=categorias">