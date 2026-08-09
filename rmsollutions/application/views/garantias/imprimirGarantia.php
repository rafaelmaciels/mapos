<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Map OS</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 4mm;
            margin: 1mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 0.3cm; /* Reduzido de 0.5cm para 0.3cm */
            border: 0px red solid;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid page" id="viaCliente">
        <div class="subpage">
            <div class="row-fluid">
                <div class="span12">

                    <div class="invoice-content">
                        <div class="invoice-head" style="margin-bottom: 0">
                            <table class="table table-condensed" style="margin-bottom: 5px;">
                                <tbody>
                                    <?php if ($emitente == null) { ?>
                                        <tr>
                                            <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                                <<<</td> </tr> <?php
                                    } else { ?> <tr>
                                        <td style="width: 25%"><img src=" <?php echo $emitente->url_logo; ?> "></td>
                                        <td> 
                                            <span style="font-size: 18px; font-weight: bold;">
                                                <?php echo $emitente->nome; ?>
                                            </span> <br />
                                            <span style="font-size: 12px;">
                                                <?php echo $emitente->cnpj; ?> <br />
                                                <?php echo $emitente->rua . ', nº:' . $emitente->numero . ', ' . $emitente->bairro . ' - ' . $emitente->cidade . ' - ' . $emitente->uf; ?> 
                                            </span> <br /> 
                                            <span style="font-size: 12px;"> E-mail:
                                                <?php echo $emitente->email . ' - Fone: ' . $emitente->telefone; ?>
                                            </span>
                                        </td>
                                        <td style="width: 18%; text-align: center; vertical-align: middle;">
                                            <span style="font-size: 12px;">Emissão: <br/>
                                                <strong><?php echo date('d/m/Y'); ?></strong>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div style="margin-top: 5px; margin-bottom: 5px;">
                            <h4 class="text-center" style="font-size: 18px; margin: 0;">Termo de Garantia</h4>
                        </div>

                        <div style="width: 100%; margin-bottom: 10px; text-align: justify; font-size: 14px;">
                            <?php echo printSafeHtml($result->textoGarantia, get_defined_vars()); ?>
                        </div>

                        <table class="table table-bordered table-condensed" style="margin-bottom: 0;">
                            <tbody>
                                <tr>
                                    <td>Data
                                        <hr style="margin: 20px 0 5px 0;">
                                    </td>
                                    <td>Assinatura do Cliente
                                        <hr style="margin: 20px 0 5px 0;">
                                    </td>
                                    <td>Assinatura do Técnico Responsável
                                        <hr style="margin: 20px 0 5px 0;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>