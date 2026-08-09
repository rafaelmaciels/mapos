<?php if ($emitente): ?>
    <table width="100%" style="border-bottom: 2px solid #2D335B; padding-bottom: 8px; margin-bottom: 12px; font-family: sans-serif;">
        <tr>
            <td width="35%" align="left" valign="middle">
                <?php if (file_exists(convertUrlToUploadsPath($emitente->url_logo))): ?>
                    <img style="max-width: 160px; max-height: 60px;" src="<?= convertUrlToUploadsPath($emitente->url_logo) ?>" alt="<?= htmlspecialchars($emitente->nome) ?>">
                <?php else: ?>
                    <span style="font-size: 14pt; font-weight: bold; color: #2D335B;"><?= htmlspecialchars($emitente->nome) ?></span>
                <?php endif; ?>
            </td>
            <td width="65%" align="right" valign="top" style="font-size: 8.5pt; color: #4A5568; line-height: 1.3;">
                <span style="font-size: 11pt; font-weight: bold; color: #2D335B;"><?= htmlspecialchars($emitente->nome) ?></span><br>
                <?php if ($emitente->cnpj && $emitente->cnpj != '00.000.000/0000-00'): ?>
                    <b>CNPJ:</b> <?= htmlspecialchars($emitente->cnpj) ?> |
                <?php endif; ?>
                <b>TEL:</b> <?= htmlspecialchars($emitente->telefone) ?><br>
                <b>ENDEREÇO:</b> <?= htmlspecialchars($emitente->rua) ?>, <?= htmlspecialchars($emitente->numero) ?>, <?= htmlspecialchars($emitente->bairro) ?> - <?= htmlspecialchars($emitente->cidade) ?>/<?= htmlspecialchars($emitente->uf) ?><br>
                
                <?php if (isset($title)): ?>
                    <span style="font-size: 10pt; font-weight: bold; color: #2D335B; margin-top: 4px; display: inline-block;">
                        <?= mb_strtoupper(htmlspecialchars($title)) ?>
                    </span>
                <?php endif; ?>

                <?php if (isset($dataInicial) || isset($dataFinal)): ?>
                    <br><span style="font-size: 8pt; color: #718096;">
                        PERÍODO: <?= isset($dataInicial) ? htmlspecialchars($dataInicial) : 'Início' ?> Até <?= isset($dataFinal) ? htmlspecialchars($dataFinal) : 'Hoje' ?>
                    </span>
                <?php endif; ?>
            </td>
        </tr>
    </table>
<?php endif; ?>
