<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etiqueta OS #<?php echo $result->idOs; ?></title>
    <style>
        @page {
            size: auto;
            margin: 5mm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 5px;
            background-color: #fff;
            color: #000;
        }
        .etiqueta-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 10px;
        }
        .etiqueta-box {
            width: 80mm;
            box-sizing: border-box;
            border: 2px dashed #333;
            border-radius: 4px;
            padding: 8px 10px;
            background: #fff;
            page-break-inside: avoid;
            break-inside: avoid;
        }
        .etiqueta-header {
            text-align: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
            margin-bottom: 6px;
        }
        .etiqueta-header .empresa {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            color: #444;
        }
        .etiqueta-body {
            font-size: 13px;
            line-height: 1.4;
        }
        .etiqueta-os {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            background: #eee;
            padding: 4px 0;
            border-radius: 3px;
            margin: 4px 0;
        }
        .etiqueta-campo {
            margin-top: 4px;
        }
        .etiqueta-label {
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            color: #666;
            display: block;
        }
        .etiqueta-valor {
            font-size: 14px;
            font-weight: bold;
            color: #000;
            word-wrap: break-word;
        }
        @media print {
            body {
                padding: 0;
            }
            .etiqueta-wrapper {
                gap: 8mm;
            }
            .etiqueta-box {
                border: 1px solid #000;
                page-break-inside: avoid;
                break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="etiqueta-wrapper">
        <?php for ($i = 0; $i < $qtd; $i++) : ?>
            <div class="etiqueta-box">
                <?php if (!empty($emitente)) : ?>
                    <div class="etiqueta-header">
                        <span class="empresa"><?php echo htmlspecialchars($emitente->nome); ?></span>
                    </div>
                <?php endif; ?>
                <div class="etiqueta-body">
                    <div class="etiqueta-os">
                        OS N°: <?php echo htmlspecialchars($result->idOs); ?>
                    </div>
                    <div class="etiqueta-campo">
                        <span class="etiqueta-label">Cliente:</span>
                        <span class="etiqueta-valor"><?php echo htmlspecialchars($result->nomeCliente); ?></span>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</body>
</html>
