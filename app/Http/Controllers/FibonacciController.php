<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    // Desafio 1: Soma de números até o índice 13
    public function desafio1()
    {
        $INDICE = 13;
        $SOMA = 0;
        $K = 0;

        while ($K < $INDICE) {
            $K += 1;
            $SOMA += $K;
        }

        return response()->json(['soma' => $SOMA]);
    }

    // Desafio 2: Verificar se um número pertence à sequência de Fibonacci
    public function desafio2($num)
    {
        $a = 0;
        $b = 1;

        while ($b < $num) {
            $temp = $b;
            $b = $a + $b;
            $a = $temp;
        }

        return response()->json([
            'numero' => $num,
            'pertence' => $b == $num
        ]);
    }

    // Desafio 3: Cálculo de faturamento
    public function desafio3()
    {
        // Supondo que o faturamento esteja em um JSON armazenado no storage
        $json = file_get_contents(storage_path('app/faturamento.json'));
        $faturamento = json_decode($json, true);

        $valoresValidos = array_filter($faturamento, fn($valor) => $valor > 0);
        $menor = min($valoresValidos);
        $maior = max($valoresValidos);
        $media = array_sum($valoresValidos) / count($valoresValidos);
        $diasAcimaDaMedia = count(array_filter($valoresValidos, fn($valor) => $valor > $media));

        return response()->json([
            'menor_faturamento' => $menor,
            'maior_faturamento' => $maior,
            'dias_acima_media' => $diasAcimaDaMedia
        ]);
    }

    // Desafio 4: Cálculo do percentual de faturamento por estado
    public function desafio4()
    {
        $faturamentoEstados = [
            'SP' => 67836.43,
            'RJ' => 36678.66,
            'MG' => 29229.88,
            'ES' => 27165.48,
            'Outros' => 19849.53
        ];

        $total = array_sum($faturamentoEstados);
        $percentuais = [];

        foreach ($faturamentoEstados as $estado => $valor) {
            $percentuais[$estado] = round(($valor / $total) * 100, 2);
        }

        return response()->json(['percentuais' => $percentuais]);
    }

    // Desafio 5: Inverter string sem usar funções prontas
    public function desafio5($string)
    {
        $invertida = '';
        for ($i = strlen($string) - 1; $i >= 0; $i--) {
            $invertida .= $string[$i];
        }

        return response()->json(['original' => $string, 'invertida' => $invertida]);
    }
}
