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


teste(fizzbuzz(1), 1);
teste(fizzbuzz(2), 2);
teste(fizzbuzz(3), 'Fizz');
teste(fizzbuzz(4), 4);
teste(fizzbuzz(5), 'Buzz');
teste(fizzbuzz(6), 'Fizz');
teste(fizzbuzz(7), 7);
teste(fizzbuzz(8), 8);
teste(fizzbuzz(9), 'Fizz');
teste(fizzbuzz(10), 'Buzz');
teste(fizzbuzz(11), 11);
teste(fizzbuzz(12), 'Fizz');
teste(fizzbuzz(13), 13);
teste(fizzbuzz(14), 14);
teste(fizzbuzz(15), 'FizzBuzz');
teste(fizzbuzz(16), 16);
teste(fizzbuzz(18), 'Fizz');
teste(fizzbuzz(20), 'Buzz');
teste(fizzbuzz(21), 'Fizz');
teste(fizzbuzz(30), 'FizzBuzz');


function teste($resultado, $esperado)
{
    if ($resultado === $esperado) {
        return true;
    } else {
        echo $resultado;
        echo '<br>';
        echo $esperado;
        throw new Exception();
    }
}