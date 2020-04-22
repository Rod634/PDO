<?php

require_once 'global.php';

$id = $_GET['id'];

try{
    $categoria = new Categoria($id);
    $categoria->deletar();
}catch(Exception $e){
    Execs::tratar($e);
}


header('location: categorias.php');