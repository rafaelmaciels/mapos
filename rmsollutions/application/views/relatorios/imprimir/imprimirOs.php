<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($title ?? 'Relatório de OS') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/mpdf-reports.css') ?>" />
</head>
<body>
    <?= $topo ?>

    <table class="report-table">
        <thead>
            <tr>
                <th width="6%" class="text-center">OS</th>
                <th width="20%">CLIENTE</th>
                <th width="12%" class="text-center">STATUS</th>
                <th width="10%" class="text-center">DATA</th>
                <th width="22%">DESCRIÇÃO</th>
                <th width="10%" class="text-right">PRODUTOS</th>
                <th width="10%" class="text-right">SERVIÇOS</th>
                <th width="10%" class="text-right">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php if (! empty($os)): ?>
                <?php foreach ($os as $c): ?>
                    <?php
                    $valTotal = $c->total_produto + $c->total_servico;
                    $valFinal = ($c->valor_desconto != 0) ? $c->valor_desconto : $valTotal;
                    ?>
                    <tr>
                        <td class="text-center"><b>#<?= str_pad($c->idOs, 4, '0', STR_PAD_LEFT) ?></b></td>
                        <td><?= htmlspecialchars($c->nomeCliente) ?></td>
                        <td class="text-center"><?= htmlspecialchars($c->status) ?></td>
                        <td class="text-center"><?= date('d/m/Y', strtotime($c->dataInicial)) ?></td>
                        <td><?= htmlspecialchars(mb_strimwidth($c->descricaoProduto ?? '', 0, 45, '...')) ?></td>
                        <td class="text-right">R$ <?= number_format($c->total_produto, 2, ',', '.') ?></td>
                        <td class="text-right">R$ <?= number_format($c->total_servico, 2, ',', '.') ?></td>
                        <td class="text-right"><b>R$ <?= number_format($valFinal, 2, ',', '.') ?></b></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td colspan="5" class="text-right">TOTAIS GERAIS:</td>
                    <td class="text-right">R$ <?= number_format($total_produtos, 2, ',', '.') ?></td>
                    <td class="text-right">R$ <?= number_format($total_servicos, 2, ',', '.') ?></td>
                    <td class="text-right">R$ <?= number_format($total_geral, 2, ',', '.') ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Nenhuma Ordem de Serviço encontrada para os filtros selecionados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
