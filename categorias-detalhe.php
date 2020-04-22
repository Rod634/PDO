<?php require_once 'cabecalho.php' ?>
<?php require_once 'global.php' ?>
<?php

    try{
        $id = $_GET['id'];
        $categoria = new Categoria($id);
        $categoria->carregarProdutos();
        $listaProdutos = $categoria->produtos;
    }catch(Exception $e){
        Execs::tratar($e);
    }

?>

<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?php echo $categoria->id?></dd>
    <dt>Nome</dt>
    <dd><?php echo $categoria->nome?></dd>
    <dt>Produtos</dt>
    <dd>
        <ul>
            <?php foreach ($listaProdutos as $lista) : ?>
            <li><a href="/produtos-editar.php?id=<?php echo $lista['id'] ?>"><?php echo $lista['nome']?></a></li>
            <?php endforeach ?>
        </ul>
    </dd>
</dl>
<?php require_once 'rodape.php' ?>
