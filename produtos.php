<?php require_once 'global.php';
        try{
            // $produto = new Produto();
            $lista = Produto::listar();
        }catch(Exception $e){
            Execs::tratar($e);
        }
?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Criar Novo Produto</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    <?php if(count($lista) > 0): ?>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $linha): ?>
                <tr>
                    <td><?php echo $linha['id'] ?></td>
                    <td><?php echo $linha['nome'] ?></td>
                    <td>R$ <?php echo $linha['preco'] ?></td>
                    <td><?php echo $linha['quantidade'] ?></td>
                    <td><?php echo $linha['categoria_nome'] ?></td>
                    <td><a href="/produtos-editar.php?id=<?php echo $linha['id']?>" class="btn btn-info">Editar</a></td>
                    <td><a href="/produtos-excluir.php?id=<?php echo $linha['id']?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
                <?php else: ?>
                    <p>Nenhum Produto Cadastrado</p>
                <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
