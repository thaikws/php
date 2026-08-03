<div class="col-sm-12 mb-4">

    <div class="card shadow mb-4">
        <!-- striped é para zebrar as linhas, cada uma com uma cor-->
        <div class="table-responsive-sm mt-4">
            <h3 class="ml-3">
                Listar Clientes
                <a class="btn btn-success float-right mb-3 mr-3" href="?p=add/cliente"><i class="bi bi-database-fill-add"></i></a>
            </h3>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include_once __DIR__ . '/../../models/Cliente.php';
                    $cli = new Cliente();

                    $dados = $cli->listar(null);
                    if($dados){
                    foreach($dados as $mostrar){
                    ?>
                    <tr>
                        <td><?= $mostrar['id'] ?></td>
                        <td><?= $mostrar['nome'] ?></td>
                        <td><?= $mostrar['email'] ?></td>
                        <td>
                            <a class="btn btn-danger btn-sm"
                                href="?p=excluir/cliente&id=<?= $mostrar['id'] ?>"
                                onclick="return confirm('Deseja realmente excluir este cliente?')">
                                <i class="bi bi-trash"></i>
                            </a>

                            <a class="btn btn-warning btn-sm"
                                href="?p=editar/cliente&id=<?= $mostrar['id'] ?>">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
    }
}else{
?>
<tr>
    <td colspan="4" class="text-center">
        Nenhum cliente cadastrado.
    </td>
</tr>
<?php
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>