<?php

/**
 * Desafio FizzBuzz
 * Escreva uma função que receba um número e:
 * Se o número for divisível por 3, no lugar do número escreva 'Fizz'
 * Se o número for divisível por 5, no lugar do número escreva 'Buzz'
 * Se o número for divisível por 3 e 5, no lugar do número escreva 'FizzBuzz'
 * Se não for múltiplo 3 e 5, retorna o número
 */

/**
 * @param int $entrada
 * @return string|null
 */
function fizzbuzz($entrada)
{
    $retorno = null;

    switch ($entrada) {
        case $entrada % 3 == 0 && $entrada % 5 == 0:
            $retorno = 'FizzBuzz';
            break;
        case $entrada % 3 == 0 :
            $retorno = 'Fizz';
            break;
        case $entrada % 5 == 0:
            $retorno = 'Buzz';
            break;
        default:
            $retorno = $entrada;
            break;
    }

    return $retorno;
}


testar('fizzbuzz', [
    [
        'descricao' => 'Recebe 1 retorna 1',
        'entrada' => 1,
        'esperado' => 1
    ],
    [
        'descricao' => 'Recebe 2 retorna 2',
        'entrada' => 2,
        'esperado' => 2
    ],
    [
        'descricao' => 'Recebe 3, mod 3 returna Fizz',
        'entrada' => 3,
        'esperado' => 'Fizz'
    ],
    [
        'descricao' => 'Recebe 4 retorna 4',
        'entrada' => 4,
        'esperado' => 4
    ],
    [
        'descricao' => 'Recebe 5, mod 5 retorna Buzz',
        'entrada' => 5,
        'esperado' => 'Buzz'
    ],
    [
        'descricao' => 'Recebe 6, mod 3 returna Fizz',
        'entrada' => 6,
        'esperado' => 'Fizz'
    ],
    [
        'descricao' => 'Recebe 7 retorna 7',
        'entrada' => 7,
        'esperado' => 7
    ],
    [
        'descricao' => 'Recebe 8 retorna 9',
        'entrada' => 8,
        'esperado' => 9
    ],
    [
        'descricao' => 'Recebe 15, mod de 3 e 5, retorna FizzBuzz',
        'entrada' => 15,
        'esperado' => 'FizzBuzz'
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