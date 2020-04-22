<?php require_once 'global.php'; 

    $id = $_GET['id'];
    
    try{

        $produto = new Produto();
        $produto->id = $id;
        
        $produto->deletar();
        header('location: produtos.php');

    }catch(Exception $e){
        Execs::tratar($e);
    }


?>