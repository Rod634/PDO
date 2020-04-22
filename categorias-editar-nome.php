<?php

require_once 'global.php';

$id = $_POST['id'];
$nome = $_POST['nome'];

try{
    $categoria = new Categoria($id);
    $categoria->nome = $nome;
    
    $categoria->atualizar();
}catch(Exception $e){
    Execs::tratar($e);
}


header('Location: categorias.php');