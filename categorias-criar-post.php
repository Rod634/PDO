<?php
    require_once 'global.php';
 
    try{
        $categoria = new Categoria();
        $nome = $_POST['nome'];
        $categoria->nome = $nome;
        $categoria->inserir();
    }catch(Exception $e){
        Execs::tratar($e);
    }
    

    header('Location: categorias.php');