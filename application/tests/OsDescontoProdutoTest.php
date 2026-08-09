<?php

class OsDescontoProdutoTest
{
    private $passed = 0;
    private $failed = 0;

    public static function calcularDescontoItem($preco, $quantidade, $tipoDesconto, $descontoInput)
    {
        $preco = floatval($preco);
        $quantidade = floatval($quantidade);
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
        echo "=== Executando Testes de Cálculo de Desconto por Item na OS ===\n\n";

        // Teste 1: Desconto Percentual (10% de R$ 100 x 2 un = R$ 180 final, R$ 20 desconto)
        $res1 = self::calcularDescontoItem(100.00, 2, 'porcento', 10);
        $this->assert($res1['valorDesconto'] == 20.00 && $res1['subtotal'] == 180.00, "Desconto Percentual 10% sobre R$ 200,00 -> Desc: R$ 20,00, Subtotal: R$ 180,00");

        // Teste 2: Desconto Valor Fixo (R$ 15,00 de R$ 50 x 3 un = R$ 135 final, R$ 15 desconto)
        $res2 = self::calcularDescontoItem(50.00, 3, 'real', 15.00);
        $this->assert($res2['valorDesconto'] == 15.00 && $res2['subtotal'] == 135.00, "Desconto Valor Fixo R$ 15,00 sobre R$ 150,00 -> Desc: R$ 15,00, Subtotal: R$ 135,00");

        // Teste 3: Desconto Zerado (Retrocompatibilidade)
        $res3 = self::calcularDescontoItem(75.00, 1, 'real', 0);
        $this->assert($res3['valorDesconto'] == 0.00 && $res3['subtotal'] == 75.00, "Desconto Zerado -> Desc: R$ 0,00, Subtotal: R$ 75,00");

        // Teste 4: Desconto Total (100%)
        $res4 = self::calcularDescontoItem(120.00, 1, 'porcento', 100);
        $this->assert($res4['valorDesconto'] == 120.00 && $res4['subtotal'] == 0.00, "Desconto 100% -> Desc: R$ 120,00, Subtotal: R$ 0,00");

        // Teste 5: Desconto em Valor Fixo Igual ao Total do Item
        $res5 = self::calcularDescontoItem(80.00, 2, 'real', 160.00);
        $this->assert($res5['valorDesconto'] == 160.00 && $res5['subtotal'] == 0.00, "Desconto R$ 160,00 em Item de R$ 160,00 -> Desc: R$ 160,00, Subtotal: R$ 0,00");

        // Teste 6: Limite Excedido em Percentual (> 100% deve limitar em 100%)
        $res6 = self::calcularDescontoItem(100.00, 1, 'porcento', 150);
        $this->assert($res6['desconto'] == 100 && $res6['valorDesconto'] == 100.00 && $res6['subtotal'] == 0.00, "Desconto 150% limitado em 100% -> Desc: R$ 100,00, Subtotal: R$ 0,00");

        // Teste 7: Limite Excedido em R$ (> valor total do item deve limitar no valor total)
        $res7 = self::calcularDescontoItem(100.00, 1, 'real', 250.00);
        $this->assert($res7['desconto'] == 100.00 && $res7['valorDesconto'] == 100.00 && $res7['subtotal'] == 0.00, "Desconto R$ 250,00 em item de R$ 100,00 limitado no valor do item -> Desc: R$ 100,00, Subtotal: R$ 0,00");

        echo "\n---------------------------------------------------------------\n";
        echo "Resultado dos Testes: {$this->passed} Passaram, {$this->failed} Falharam.\n";
        echo "---------------------------------------------------------------\n";

        return $this->failed === 0;
    }
}

// Executar quando chamado via CLI
if (php_sapi_name() === 'cli' && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    $test = new OsDescontoProdutoTest();
    $success = $test->run();
    exit($success ? 0 : 1);
}
