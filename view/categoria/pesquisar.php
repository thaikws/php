
<?php

require_once __DIR__ . '/../../controller/CategoriaController.php';

$controller = new CategoriaController();

$nome = trim($_GET['nome'] ?? '');
$dados = [];

if ($nome !== '') {
    $dados = $controller->pesquisar($nome);
}

?>

<div class="col-sm-12 mb-4">

    <div class="card shadow mb-4">

        <div class="card-body">

            <h3 class="text-primary mb-4">
                Pesquisar Categoria
            </h3>

            <form method="get" action="">

                <input type="hidden"
                       name="p"
                       value="pesquisar/categoria">

                <div class="form-group">

                    <label for="nome">
                        Nome da categoria
                    </label>

                    <input type="text"
                           class="form-control"
                           id="nome"
                           name="nome"
                           placeholder="Digite o nome ou a informação"
                           value="<?= htmlspecialchars(
                               $nome,
                               ENT_QUOTES,
                               'UTF-8'
                           ) ?>">

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="bi bi-search"></i>
                    Pesquisar

                </button>

                <a href="?p=categorias"
                   class="btn btn-secondary">

                    Voltar

                </a>

            </form>

            <?php if ($nome !== ''): ?>

                <div class="table-responsive-sm mt-4">

                    <h5>Resultados da pesquisa</h5>

                    <table class="table table-striped table-sm">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Informações</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if (count($dados) > 0): ?>

                                <?php foreach ($dados as $mostrar): ?>

                                    <tr>

                                        <td>
                                            <?= htmlspecialchars(
                                                (string) $mostrar['id'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars(
                                                $mostrar['nome'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars(
                                                $mostrar['informacoes'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="4"
                                        class="text-center">

                                        Nenhum categoria encontrada.

                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>
