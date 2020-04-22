<?php

class Produto{

    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;

    public static function listar()
    {
        $query = "SELECT p.id, p.nome, p.preco, p.quantidade, p.categoria_id, c.nome as categoria_nome 
        FROM produtos p
        INNER JOIN categorias c ON p.categoria_id = c.id
        ORDER BY p.id";
        $conexao = Conexao::conectar();
        $result = $conexao->query($query);
        $lista = $result->fetchAll();
        return $lista;
    }

    public function inserir()
    {
        $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id) 
        VALUES (:nome, :preco, :quantidade, :categoria_id)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->execute();
    }

    public function carregar($id)
    {
        if($id){

            $query = "SELECT id, nome, preco, quantidade, categoria_id FROM produtos WHERE id = :id";
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $registro = $stmt->fetch();
            $this->id           = $registro['id'];
            $this->nome         = $registro['nome'];
            $this->preco        = $registro['preco'];
            $this->quantidade   = $registro['quantidade'];
            $this->categoria_id = $registro['categoria_id'];
            
        }
        
    }

    public function deletar()
    {
        $query = "DELETE FROM produtos WHERE id= :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE produtos 
        SET nome = :nome, preco = :preco, quantidade = :quantidade, categoria_id = :categoria_id
        WHERE id = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public static function listarPorCategoria($categoria_id)
    {
        $query = "SELECT id, nome, preco, quantidade, categoria_id FROM produtos WHERE categoria_id = :categoria_id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}


