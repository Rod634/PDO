<?php   
    require 'global.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $categoria_id = $_POST['categoria_id'];

    try{
        $produto  = new Produto();
        $produto->id = $id;
        $produto->nome = $nome;
        $produto->preco = $preco;
        $produto->quantidade = $quantidade;
        $produto->categoria_id = $categoria_id;
        $produto->atualizar();

        header('location: produtos.php');

    }catch(Exception $e){
        Execs::tratar($e);
    }
    







?>