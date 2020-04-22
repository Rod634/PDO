<?php

class Categoria
{

    public $id;
    public $nome;
    public $produtos;

    public function __construct($id = false)
    {
        if($id){
            $this->id = $id;
            $this->capturar();
        }
    }

    public static function listar()
    {
        $query = "SELECT id, nome FROM categorias";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function capturar()
    {
        $query = "SELECT id, nome FROM categorias WHERE id = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $registro = $stmt->fetch();
        $this->nome = $registro['nome'];
    }

    public function inserir()
    {
        $query = "INSERT INTO categorias (nome) VAlUES (:nome)";    
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM categorias WHERE id = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE categorias set nome = :nome  WHERE id = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function carregarProdutos()
    {
        $this->produtos = Produto::listarPorCategoria($this->id);
    }

}