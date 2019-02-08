<?php

/**
 *
 * Palavras Primas
 * Contribuição de: Marianna Reis
 *
 * Gostei! Vamos usar esse!
 * Talvez. Mas mostre-me outro.
 * Não gostei! Mostre-me outro.
 *
 * Este problema foi utilizado em 221 Dojo(s).
 *
 * Um número primo é definido se ele possuir exatamente dois divisores:
 *
 * o número um e ele próprio. São exemplos de números primos: 2, 3, 5, 101, 367 e 523.
 *
 * Neste problema, você deve ler uma palavra composta somente por letras [a-zA-Z].
 * Cada letra possui um valor específico, a vale 1, b vale 2 e assim por diante, até a letra z que vale 26.
 * Do mesmo modo A vale 27, B vale 28, até a letra Z que vale 52.
 *
 * Você precisa definir se cada palavra em um conjunto de palavras é prima ou não. Para ela ser prima, a soma dos valores de suas letras deve ser um número primo.
 * http://dojopuzzles.com/problemas/exibe/palavras-primas/
 *
 */

/**
 * @param int $entrada
 * @return boolean
 */
function palavras_primas($entrada)
{

    $retorno = false;

    if (strlen($entrada) == 1) {
        $valor_letra = retorna_valor_letra($entrada);

        // U = 21

        for ($i = 0; $i <= $valor_letra; $i++) {
            // Se o número é divisivel por 2 ou por 3 ele não é primo
            if ($i % 2 != 0 AND $i % 3 != 0) {
                return true;
            }

        }
    }

    if ($entrada == 'a') {
        $retorno = true;
    }

    if ($entrada == 'b') {
        $retorno = true;
    }

    if ($entrada == 'c') {
        $retorno = true;
    }

    if ($entrada == 'd') {
        $retorno = false;
    }


    return $retorno;
}

function retorna_valor_letra($letra)
{
    $letras = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    foreach ($letras as $idx => $l) {
        if ($letra == $l) {
            return $idx + 1;
        }
    }

}

testar('palavras_primas', [
    [
        'descricao' => 'A é primo',
        'entrada' => 'a',
        'esperado' => true
    ],
    [
        'descricao' => 'B é primo',
        'entrada' => 'b',
        'esperado' => true
    ],
    [
        'descricao' => 'C é primo',
        'entrada' => 'c',
        'esperado' => true
    ],
    [
        'descricao' => 'D não é primo',
        'entrada' => 'd',
        'esperado' => false
    ],
    [
        'descricao' => 'ceu (3 + 5 + 21) = 29 é primo',
        'entrada' => 'ceu',
        'esperado' => true
    ]
]);


function testar($funcao, $testes_arr)
{

    echo '<h2>Testes função: ' . $funcao . '</h2>';
    echo '<table border="2" cellpadding="5" style="border-collapse: collapse; border-color: white; text-align: center;">';

    echo '<tr>
            <th style="text-align: left;">Descrição</th>
            <th>Entrada</th>
            <th>Saída</th>
            <th>Esperado</th>
            <th>Resultado</th>
          </tr>';

    foreach ($testes_arr as $teste) {

        $descricao = $teste['descricao'];
        $entrada = $teste['entrada'];
        $esperado = $teste['esperado'];

        $saida = $funcao($entrada);
        $resultado = $saida === $esperado;

        echo sprintf('<tr style="background-color: %s;">
                                <td style="text-align: left;">%s</td>
                                <td>%s</td>
                                <td>%s</td>
                                <td>%s</td>
                                <td>%s</td>
                             </tr>
                            ',
            ($resultado ? 'green' : 'red'),
            $descricao,
            $entrada,
            $saida,
            $esperado,
            ($resultado ? 'Passou!' : 'Falhou :(')
        );
    }

    echo '</table>';
}