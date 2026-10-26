<?php
require_once __DIR__ . '/../../controller/ClienteController.php';

$controller = new ClienteController();

$nome = trim($_GET['nome'] ?? '');
$dados = [];

if ($nome !== '') {
    $dados = $controller->pesquisar($nome);
}
?>

<div class="card shadow mb-4 p-3">
    <h3>Pesquisar Cliente</h3>

    <form method="get" action="">
        <input type="hidden" name="p" value="pesquisar/cliente">

        <div class="form-group">
            <label for="nome">Nome do cliente:</label>

            <input
                type="text"
                class="form-control"
                id="nome"
                name="nome"
                placeholder="Digite o nome do cliente"
                value="<?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>"
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Pesquisar
        </button>

        <a href="?p=clientes" class="btn btn-secondary">
            Voltar
        </a>
    </form>

    <?php if ($nome !== ''): ?>

        <div class="table-responsive mt-4">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (count($dados) > 0): ?>

                        <?php foreach ($dados as $cliente): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars((string) $cliente['id']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($cliente['nome'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($cliente['email'], ENT_QUOTES, 'UTF-8') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="3" class="text-center">
                                Nenhum cliente encontrado.
                            </td>
                        </tr>

                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
</div>