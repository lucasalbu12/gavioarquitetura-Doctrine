<?php require __DIR__ . '/../inicio-html.php'; ?>
<div class="form-group">
    <a href="/lista-projetos" class="btn btn-primary">Voltar</a>

    <form enctype='multipart/form-data' action="/salvar-projeto<?= isset($projeto) ? '?id=' . $projeto->getId() : '' ;?>" method="post">


        <?php foreach($categorias as $categoria): ?>
            <?= $categoria->getNome(); ?>
            <input type="radio" name="categoria" class="form-group" value="<?= $categoria->getId(); ?>" readonly>
        <?php endforeach?>


        <div class="form-group"><input type="text" name='imagemAtual' value='<?= isset($projeto) ? $projeto->getArquivoImagem(): ''; ?>' readonly="readonly"></div>
        <div class="form-group"><input type="text" name='titulo' placeholder='Insira o nome do projeto' class="form-group" value='<?= isset($projeto) ? $projeto->getTitulo(): ''; ?>'></div>
        <div class="form-group"><input type="text" name='area' placeholder='Insira a área' class="form-group" value='<?= isset($projeto) ? $projeto->getArea(): ''; ?>'></div>
        <div class="form-group"><input type="text" name='ano' placeholder='Insira a data' class="form-group" value='<?= isset($projeto) ? $projeto->getAno(): ''; ?>'></div>
        <div class="form-group"><input type="text" name='endereco' placeholder='Insira a localização' class="form-group" value='<?= isset($projeto) ? $projeto->getEndereco(): ''; ?>'></div>
        <div class="form-group"><textarea name="descricao" id="descricao" placeholder='Descrição do projeto' class="form-group"><?= isset($projeto) ? $projeto->getDescricao(): ''; ?></textarea></div>
        <input type="hidden" name='MAX_FILE_SIZE' value='999999999'>
        <div class="form-group"><input type="file" name='arquivoImagem' required></div>
        <div class="form-group"> <button class="btn btn-primary">Salvar</button></div>

        <input type="text" style="display: block" name="tituloAtual" value="<?= $projeto->getTitulo(); ?>">
    </form>

</div>

<?php require __DIR__ . '/../final-html.php'; ?>