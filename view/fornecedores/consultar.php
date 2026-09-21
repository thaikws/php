<div class="col-sm-12 mb-4">

    <div class="card shadow mb-4">

        <div class="table-responsive-sm mt-4">

            <h3 class="ml-3">
                Listar Fornecedores

                <a class="btn btn-success float-right mb-3 mr-3"
                   href="?p=add/fornecedor">

                    <i class="bi bi-database-fill-add"></i>

                </a>

            </h3>

            <table class="table table-striped table-sm">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Empresa</th>
                        <th>Função</th>
                        <th>Ações</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    require_once __DIR__ .
                        '/../../controller/FornecedorController.php';

                    $fornecedor = new FornecedorController();

                    $dados = $fornecedor->listar();

                    if ($dados) {

                        foreach ($dados as $mostrar) {

                    ?>

                    <tr>

                        <td><?= $mostrar['id'] ?></td>

                        <td><?= $mostrar['nome'] ?></td>

                        <td><?= $mostrar['empresa'] ?></td>

                        <td><?= $mostrar['funcao'] ?></td>

                        <td>

                            <a class="btn btn-danger btn-sm"
                               href="?p=excluir/fornecedor&id=<?= $mostrar['id'] ?>"
                               onclick="return confirm('Deseja realmente excluir este fornecedor?')">

                                <i class="bi bi-trash"></i>

                            </a>

                            <a class="btn btn-warning btn-sm"
                               href="?p=editar/fornecedor&id=<?= $mostrar['id'] ?>">

                                <i class="bi bi-pencil"></i>

                            </a>

                        </td>

                    </tr>

                    <?php

                        }

                    } else {

                    ?>

                    <tr>

                        <td colspan="5"
                            class="text-center">

                            Nenhum fornecedor cadastrado.

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
