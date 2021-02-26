<?php

/**
 * Desafio: Caixa eletrônico
 * 
 * Desenvolva um programa que simule a entrega de notas quando um cliente efetuar um saque em um caixa eletrônico. 
 * Os requisitos básicos são os seguintes:
 * 
 * - Entregar o menor número de notas;
 * - É possível sacar o valor solicitado com as notas disponíveis;
 * - Saldo do cliente infinito;
 * - Quantidade de notas infinito (pode-se colocar um valor finito de cédulas para aumentar a dificuldade do problema);
 * - Notas disponíveis de R$ 100,00; R$ 50,00; R$ 20,00 , R$ 10,00 e R$ 5,00
 * 
 * Exemplos:
 * 
 * - Valor do Saque: R$ 30,00 – Resultado Esperado: Entregar 1 nota de R$20,00 e 1 nota de R$ 10,00.
 * - Valor do Saque: R$ 80,00 – Resultado Esperado: Entregar 1 nota de R$50,00 1 nota de R$ 20,00 e 1 nota de R$ 10,00.
 *
 * 
 * O programa deverá retornar um vetor com o seguinte formato.
 * Exemplo: Saque de R$ 35,00
 * retorno = [
 *        '30.00' => 1, 
 *        '5.00' => 1,
 * ] 
 * 
 * Caso o saque seja um numero sem nota, ele retornará nulo
 * Exemplo: Saque de R$ 2,00
 * retorno = null
 *
 * @param mixed $valor 
 * @return array|null
 */


// Adriele -> Russell -> Robson -> Victor -> Rafael 
function saque($valor)
{
  //$notas_disponiveis_arr = [100.00, 50.00, 20.00, 10.00, 5.00];

  $notas = [];
  //valor = 30
  if ($valor % 20.00  == 0) {
    $notas['20.00'] = $valor / 20.00;
  }

  //valor = 10 (20-10)
  $valor = $valor - (20.00 * $notas['20.00']);

  if ($valor % 10.00 == 0) {
    $notas = ['10.00' => $valor / 10.00];
  }

  

  return $notas;
}

// RETORNAR ['10.00' => 1];


/**
 ************************************************************
 ****** ATENÇÃO: NÃO ALTERAR O CÓDIGO A PARTIR DAQUI ********
 ************************************************************ 
 */

testar('saque', [
  [
    'entrada' => 10.00,
    'esperado' => [
      '10.00' => 1
    ]
  ],

  [
    'entrada' => 20.00,
    'esperado' => [
      '20.00' => 1
    ]
  ],

  [
    'entrada' => 30.00,
    'esperado' => [
      '20.00' => 1,
      '10.00' => 1
    ]
  ],
]);


function testar($funcao, $testes_arr)
{
  foreach ($testes_arr as $idx => $teste) {
    ['descricao' => $descricao, 'entrada' => $entrada, 'esperado' => $esperado] = $teste;

    if (is_array($entrada)) {
      $saida = call_user_func_array($funcao, $entrada);
      $parametros = implode(',', $entrada);
    } else {
      $saida = $funcao($entrada);
      $parametros = $entrada;
    }

    if (is_array($saida)) {
      $saida = print_r($saida, true);
    }

    if (is_array($esperado)) {
      $esperado = print_r($esperado, true);
    }

    $resultado = $saida === $esperado;

    if($resultado){
      echo sprintf(
        "▶️ TESTE %s %s \n--------------------\n",
        ($idx + 1),
        ($resultado ? '✅✅✅ Passou!' : '🚫🚫🚫 Falhou!')
      );
    }else{
      echo sprintf(
        "▶️ TESTE %s %s \n--------------------\nChamada: %s(%f) \n--------------------\nSaída:\n%s  \n--------------------\nSaída Esperada:\n%s\n---\n\n",
        ($idx + 1),
        ($resultado ? '✅✅✅ Passou!' : '🚫🚫🚫 Falhou!'),
        $funcao,
        $parametros,
        $saida,
        $esperado
      );
    }
    
  }
}
