<?php

class OsDescontoServicoTest
{
    private $passed = 0;
    private $failed = 0;

    public static function calcularDescontoServico($preco, $quantidade, $tipoDesconto, $descontoInput)
    {
        $preco = floatval($preco);
        $quantidade = floatval($quantidade ?: 1);
        $grossTotal = $preco * $quantidade;

        $descontoInput = floatval($descontoInput);
        $tipoDesconto = $tipoDesconto ?: 'real';

        $valorDescontoAplicado = 0.00;
        if ($descontoInput > 0) {
            if ($tipoDesconto === 'porcento') {
                if ($descontoInput > 100) {
                    $descontoInput = 100;
                }
                $valorDescontoAplicado = round(($grossTotal * ($descontoInput / 100)), 2);
            } else {
                if ($descontoInput > $grossTotal) {
                    $descontoInput = $grossTotal;
                }
                $valorDescontoAplicado = round($descontoInput, 2);
            }
        } else {
            $descontoInput = 0.00;
            $tipoDesconto = null;
        }

        $subtotal = max(0, round($grossTotal - $valorDescontoAplicado, 2));

        return [
            'grossTotal' => $grossTotal,
            'tipoDesconto' => $tipoDesconto,
            'desconto' => $descontoInput,
            'valorDesconto' => $valorDescontoAplicado,
            'subtotal' => $subtotal,
        ];
    }

    private function assert($condition, $message)
    {
        if ($condition) {
            $this->passed++;
            echo " [OK] " . $message . "\n";
        } else {
            $this->failed++;
            echo " [FAIL] " . $message . "\n";
        }
    }

    public function run()
    {
        echo "=== Executando Testes de Cálculo de Desconto por Serviço na OS ===\n\n";

        // Teste 1: Desconto Percentual em Serviço (20% de R$ 150,00 x 2 un = R$ 240,00 subtotal, R$ 60,00 desc)
        $res1 = self::calcularDescontoServico(150.00, 2, 'porcento', 20);
        $this->assert($res1['valorDesconto'] == 60.00 && $res1['subtotal'] == 240.00, "Desconto Percentual 20% em Serviço de R$ 300,00 -> Desc: R$ 60,00, Subtotal: R$ 240,00");

        // Teste 2: Desconto Valor Fixo em Serviço (R$ 50,00 de R$ 200,00 x 1 un = R$ 150,00 subtotal)
        $res2 = self::calcularDescontoServico(200.00, 1, 'real', 50.00);
        $this->assert($res2['valorDesconto'] == 50.00 && $res2['subtotal'] == 150.00, "Desconto Valor Fixo R$ 50,00 em Serviço de R$ 200,00 -> Desc: R$ 50,00, Subtotal: R$ 150,00");

        // Teste 3: Desconto Zerado em Serviço
        $res3 = self::calcularDescontoServico(80.00, 1, 'real', 0);
        $this->assert($res3['valorDesconto'] == 0.00 && $res3['subtotal'] == 80.00, "Desconto Zerado em Serviço -> Desc: R$ 0,00, Subtotal: R$ 80,00");

        // Teste 4: Desconto Total em Serviço (100%)
        $res4 = self::calcularDescontoServico(250.00, 1, 'porcento', 100);
        $this->assert($res4['valorDesconto'] == 250.00 && $res4['subtotal'] == 0.00, "Desconto 100% em Serviço -> Desc: R$ 250,00, Subtotal: R$ 0,00");

        // Teste 5: Limite Excedido em R$ (Desconto > total do serviço deve limitar no total do serviço)
        $res5 = self::calcularDescontoServico(100.00, 1, 'real', 180.00);
        $this->assert($res5['desconto'] == 100.00 && $res5['valorDesconto'] == 100.00 && $res5['subtotal'] == 0.00, "Desconto R$ 180,00 em serviço de R$ 100,00 limitado -> Desc: R$ 100,00, Subtotal: R$ 0,00");

        echo "\n---------------------------------------------------------------\n";
        echo "Resultado dos Testes de Serviço: {$this->passed} Passaram, {$this->failed} Falharam.\n";
        echo "---------------------------------------------------------------\n";

        return $this->failed === 0;
    }
}

if (php_sapi_name() === 'cli' && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    $test = new OsDescontoServicoTest();
    $success = $test->run();
    exit($success ? 0 : 1);
}
