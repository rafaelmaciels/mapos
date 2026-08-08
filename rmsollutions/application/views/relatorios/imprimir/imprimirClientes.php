<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($title ?? 'Relatório de Clientes') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/mpdf-reports.css') ?>" />
</head>
<body>
    <?= $topo ?>

    <table class="report-table">
        <thead>
            <tr>
                <th width="30%">Nome</th>
                <th width="18%" class="text-center">CPF / CNPJ</th>
                <th width="15%" class="text-center">Telefone</th>
                <th width="25%">E-mail</th>
                <th width="12%" class="text-center">Cadastro</th>
            </tr>
        </thead>
        <tbody>
            <?php if (! empty($clientes)): ?>
                <?php foreach ($clientes as $c): ?>
                    <?php $dataCadastro = ! empty($c->dataCadastro) ? date('d/m/Y', strtotime($c->dataCadastro)) : '-'; ?>
                    <tr>
                        <td><b><?= htmlspecialchars($c->nomeCliente) ?></b></td>
                        <td class="text-center"><?= htmlspecialchars($c->documento ?? '-') ?></td>
                        <td class="text-center"><?= htmlspecialchars($c->telefone ?? $c->celular ?? '-') ?></td>
                        <td><?= htmlspecialchars($c->email ?? '-') ?></td>
                        <td class="text-center"><?= $dataCadastro ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td colspan="4" class="text-right">TOTAL DE CLIENTES LISTADOS:</td>
                    <td class="text-center"><?= count($clientes) ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhum cliente encontrado para os filtros selecionados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
