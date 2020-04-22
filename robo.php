<?php require_once 'global.php';

$tipo_roupa = ['Blusa', 'Camisa', 'Camiseta', 'Bermuda', 'Calça', 'Jaqueta'];
$sexo_roupa = ['Masculina', 'Feminina'];
$cor_roupa  = ['Preta', 'Vermelha', 'Azul', 'Amarela', 'Verde', 'Branca', 'Marrom', 'Rosa'];



for($i = 0; $i < 5; $i++){

    $tipo_index = rand(0, 5);
    $sexo_index = rand(0, 1);
    $cor_index  = rand(0, 7);
    $qtd_index  = rand(1,20);
    $roupa = $tipo_roupa[$tipo_index] . ' ' . $sexo_roupa[$sexo_index] . ' ' . $cor_roupa[$cor_index];

    $produto = new Produto();
    $produto->nome  = $roupa;
    $produto->preco = 25;
    $produto->quantidade = $qtd_index;
    $produto->categoria_id = 11;

    $produto->inserir();

}