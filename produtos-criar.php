<?php require_once 'cabecalho.php';
    require_once 'global.php'; 

    try{
        $listaCategoria = Categoria::listar();
    }catch(Exception $e){
        Execs::tratar($e);
    }
?>
<div class="row">
    <div class="col-md-12">
        <h2>Criar Nova Produto</h2>
    </div>
</div>
<?php if(count($listaCategoria) > 0) :?>
<form action="produtos-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" name="preco" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number"  name="qtd" min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="nome">Categoria do Produto</label>
                <select class="form-control" name="categorias">
                    <?php foreach($listaCategoria as $categorias): ?>
                    <option value="<?php echo $categorias['id']?>"><?php echo $categorias['nome'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php else: ?>
<P>Nehuma categoria cadastrada, por favor crie uma categoria antes de criar um produto</P>
<?php endif ?>

<?php require_once 'rodape.php' ?>
