<?php

Class Conexao
{
    public function conectar()
    {
        $conexao = new PDO(DB_DRIVE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        return $conexao;
    }
}