<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Helper otimizado para geração de PDFs via mPDF 8.x
 *
 * @param string $html Conteúdo HTML a ser renderizado
 * @param string $filename Nome do arquivo PDF gerado
 * @param bool $stream Se true, abre no navegador; se false, salva em disco
 * @param bool $landscape Se true, orientação paisagem (A4-L); se false, retrato (A4)
 * @param string|null $footerHtml HTML de rodapé customizado (opcional)
 * @return string|void Retorna o caminho do arquivo temporário se $stream for false
 */
function pdf_create($html, $filename, $stream = true, $landscape = false, $footerHtml = null)
{
    $tempDir = FCPATH . 'assets/uploads/temp/';
    if (! file_exists($tempDir)) {
        @mkdir($tempDir, 0777, true);
    }

    $config = [
        'mode' => 'utf-8',
        'format' => $landscape ? 'A4-L' : 'A4',
        'margin_left' => 10,
        'margin_right' => 10,
        'margin_top' => 12,
        'margin_bottom' => 16,
        'margin_header' => 5,
        'margin_footer' => 6,
        'tempDir' => $tempDir,
    ];

    $mpdf = new \Mpdf\Mpdf($config);
    $mpdf->SetCompression(true);

    if ($footerHtml !== null) {
        $mpdf->SetHTMLFooter($footerHtml);
    } else {
        $defaultFooter = '
        <table width="100%" style="border-top: 1px solid #ddd; font-family: sans-serif; font-size: 8pt; color: #666666; padding-top: 4px;">
            <tr>
                <td width="50%" align="left">Map-OS ERP — Relatório do Sistema</td>
                <td width="50%" align="right">Emissão: ' . date('d/m/Y H:i') . ' | Página {PAGENO} de {nbpg}</td>
            </tr>
        </table>';
        $mpdf->SetHTMLFooter($defaultFooter);
    }

    $mpdf->WriteHTML($html);

    if ($stream) {
        $mpdf->Output($filename . '.pdf', 'I');
    } else {
        $targetPath = $tempDir . $filename . '.pdf';
        $mpdf->Output($targetPath, 'F');

        return $targetPath;
    }
}
