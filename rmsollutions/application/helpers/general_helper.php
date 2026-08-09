<?php

use Piggly\Pix\Parser;

if (! function_exists('convertUrlToUploadsPath')) {
    function convertUrlToUploadsPath($url)
    {
        if (! $url) {
            return;
        }

        return FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . basename($url);
    }
}

if (! function_exists('limitarTexto')) {
    function limitarTexto($texto, $limite)
    {
        $contador = strlen($texto);

        if ($contador >= $limite) {
            $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';

            return $texto;
        } else {
            return $texto;
        }
    }
}

if (! function_exists('getMoneyAsCents')) {
    function getMoneyAsCents($value)
    {
        // make sure we are dealing with a proper number now, no +.4393 or 3...304 or 76.5895,94
        if (! is_numeric($value)) {
            throw new \InvalidArgumentException('A entrada deve ser numérica!');
        }

        return intval(round(floatval($value), 2) * 100);
    }
}

if (! function_exists('getCobrancaTransactionStatus')) {
    function getCobrancaTransactionStatus($paymentGatewaysConfig, $paymentGateway, $status)
    {
        return $paymentGatewaysConfig[$paymentGateway]['transaction_status'][$status];
    }
}

if (! function_exists('getPixKeyType')) {
    function getPixKeyType($value)
    {
        if (Parser::validateDocument($value)) {
            return Parser::KEY_TYPE_DOCUMENT;
        }

        if (Parser::validateEmail($value)) {
            return Parser::KEY_TYPE_EMAIL;
        }

        if (Parser::validatePhone($value)) {
            return Parser::KEY_TYPE_PHONE;
        }

        if (Parser::validateRandom($value)) {
            return Parser::KEY_TYPE_RANDOM;
        }

        return null;
    }
}

if (! function_exists('getAmount')) {
    function getAmount($money)
    {
        $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
        $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

        $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

        $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
        $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '', $stringWithCommaOrDot);

        return floatval(str_replace(',', '.', $removedThousandSeparator));
    }
}

if (! function_exists('parseGarantiaTags')) {
    function parseGarantiaTags($html, $context = [])
    {
        if (empty($html)) {
            return '';
        }

        // Strip legacy/redundant metadata header lines if present in text
        $patterns = [
            '/<p>\s*<strong>\s*Serviço:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Prazo de Garantia:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Cliente:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Equipamento:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Marca\/Modelo:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Número de Série:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Data do Serviço:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Ordem de Serviço nº:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Local:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Data:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Prestador\/Empresa:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*CNPJ\/CPF:\s*<\/strong>.*?<\/p>/is',
            '/<p>\s*<strong>\s*Responsável:\s*<\/strong>.*?<\/p>/is',
        ];
        $html = preg_replace($patterns, '', $html);

        $os = is_array($context) ? ($context['os'] ?? ($context['result'] ?? ($context['osGarantia'] ?? null))) : (is_object($context) ? $context : null);
        $emitente = is_array($context) ? ($context['emitente'] ?? null) : null;
        $servicos = is_array($context) ? ($context['servicos'] ?? []) : [];
        $tecnico = is_array($context) ? ($context['tecnico'] ?? null) : null;

        $servicoTxt = '';
        if (! empty($servicos) && is_array($servicos)) {
            $servicoNomes = array_map(function ($s) {
                return is_object($s) ? $s->nome : ($s['nome'] ?? '');
            }, $servicos);
            $servicoTxt = implode(', ', array_filter($servicoNomes));
        }
        if (empty($servicoTxt) && is_object($os) && ! empty($os->defeito)) {
            $servicoTxt = $os->defeito;
        }
        if (empty($servicoTxt)) {
            $servicoTxt = 'Formatação de Computador, Limpeza Interna e Troca de Pasta Térmica';
        }

        $prazoGarantia = (is_object($os) && ! empty($os->osGarantiaPrazo)) ? $os->osGarantiaPrazo : ((is_object($os) && ! empty($os->garantia)) ? $os->garantia : ((is_object($os) && ! empty($os->refGarantia)) ? $os->refGarantia : '90 (noventa) dias'));

        $clienteNome = (is_object($os) && ! empty($os->nomeCliente)) ? $os->nomeCliente : ((is_object($os) && ! empty($os->cliente)) ? $os->cliente : '');

        $equipamento = (is_object($os) && ! empty($os->descricaoProduto)) ? $os->descricaoProduto : '';

        $marcaModelo = (is_object($os) && ! empty($os->observacoes)) ? $os->observacoes : '';

        $numSerie = (is_object($os) && ! empty($os->laudoTecnico)) ? $os->laudoTecnico : '';

        $dataServico = (is_object($os) && ! empty($os->osDataFinal)) ? date('d/m/Y', strtotime($os->osDataFinal)) : ((is_object($os) && ! empty($os->dataFinal)) ? date('d/m/Y', strtotime($os->dataFinal)) : ((is_object($os) && ! empty($os->dataInicial)) ? date('d/m/Y', strtotime($os->dataInicial)) : date('d/m/Y')));

        $osId = (is_object($os) && ! empty($os->idOs)) ? $os->idOs : ((is_object($os) && ! empty($os->idOS)) ? $os->idOS : '');

        $local = (is_object($emitente) && ! empty($emitente->cidade)) ? ($emitente->cidade . (! empty($emitente->uf) ? ' - ' . $emitente->uf : '')) : '';

        $dataHoje = date('d/m/Y');

        $empresaNome = (is_object($emitente) && ! empty($emitente->nome)) ? $emitente->nome : '';
        $empresaCnpj = (is_object($emitente) && ! empty($emitente->cnpj)) ? $emitente->cnpj : '';

        $responsavel = (is_object($os) && ! empty($os->tecnicoName)) ? $os->tecnicoName : ((is_object($os) && ! empty($os->nome)) ? $os->nome : ((is_object($tecnico) && ! empty($tecnico->nome)) ? $tecnico->nome : ''));

        $replacements = [
            '{SERVICO}' => $servicoTxt,
            '{PRAZO_GARANTIA}' => $prazoGarantia,
            '{CLIENTE}' => $clienteNome,
            '{EQUIPAMENTO}' => $equipamento,
            '{MARCA_MODELO}' => $marcaModelo,
            '{NUM_SERIE}' => $numSerie,
            '{DATA_SERVICO}' => $dataServico,
            '{OS_ID}' => $osId,
            '{LOCAL}' => $local,
            '{DATA_HOJE}' => $dataHoje,
            '{EMPRESA_NOME}' => $empresaNome,
            '{EMPRESA_CNPJ}' => $empresaCnpj,
            '{RESPONSAVEL}' => $responsavel,
        ];

        return strtr($html, $replacements);
    }
}

if (! function_exists('printSafeHtml')) {
    function printSafeHtml(string $html, $context = null): string
    {
        static $purifier = null;

        if ($context !== null) {
            $html = parseGarantiaTags($html, $context);
        }

        // 1. Remove all HTML comments and placeholders like <!----> or <!--...-->
        $html = preg_replace('/<!--[\s\S]*?-->/', '', $html);

        // 2. Remove invalid/leftover attributes like xss="removed" or data-path-to-node
        $html = preg_replace('/\s+xss="[^"]*"/i', '', $html);
        $html = preg_replace('/\s+data-[a-z0-9-]+="[^"]*"/i', '', $html);

        if ($purifier === null) {
            $config = HTMLPurifier_Config::createDefault();
            $config->set('HTML.AllowedCommentsRegexp', null);
            $purifier = new HTMLPurifier($config);
        }

        $cleanHtml = $purifier->purify($html);

        // 3. Final sanitization pass to guarantee zero HTML comment artifacts remain
        return preg_replace('/<!--[\s\S]*?-->/', '', $cleanHtml);
    }
}

