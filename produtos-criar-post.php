<?php require 'global.php';


    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $qtd = $_POST['qtd'];
    $categoria = $_POST['categorias'];

    try{

        $produto = new Produto();

        $produto->nome = $nome;
        $produto->preco = $preco;
        $produto->quantidade = $qtd;
        $produto->categoria_id = $categoria;
  
        $produto->inserir();
        header('location: produtos.php');

    }catch(Exception $e){
        Execs::tratar($e);
    }

   

?>
