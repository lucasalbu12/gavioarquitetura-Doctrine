<?php require __DIR__ . '/../inicio-html.php'; ?>
    <div class="form-group formulario-edicao">
        <a href="/lista-projetos" class="btn btn-primary">Voltar</a>

        <form enctype='multipart/form-data' action="/editar-projeto?id=<?= $projeto->getId(); ?>" method="post" class="d-flex flex-column">





            <div class="form-group input-categorias">
                <?php foreach($categorias as $categoria): ?>
                    <?= $categoria->getNomeCategoria(); ?>
                    <input class="form-group" type="radio" name="categoria_id" class="form-group" value="<?= $categoria->getId(); ?>">
                <?php endforeach; ?>
            </div>

            <div class="form-group"><input type="text" name='arquivoImagem' value='<?= isset($projeto) ? $projeto->getArquivoImagem(): ''; ?>' readonly="readonly"></div>
            <div class="form-group"><input type="text" name='titulo' value='<?= isset($projeto) ? $projeto->getTitulo(): ''; ?>' ></div>
            <div class="form-group"><input type="text" name='area' value='<?= isset($projeto) ? $projeto->getArea(): ''; ?>' class="form-group"></div>
            <div class="form-group"><input type="text" name='ano' value='<?= isset($projeto) ? $projeto->getAno(): ''; ?>' class="form-group"></div>
            <div class="form-group"><input type="text" name='endereco' value='<?= isset($projeto) ? $projeto->getEndereco(): ''; ?>' class="form-group"></div>
            <div class="form-group"><textarea name="descricao" id="descricao" class="form-group"><?= isset($projeto) ? $projeto->getDescricao(): ''; ?></textarea></div>

            <button class="btn btn-primary btn-default">Salvar</button>

            <div class="campo-imagem">
                <input class="form-group" type="hidden" name='MAX_FILE_SIZE' value='999999999'>
                <input type="file" name='arquivoImagem'>
            </div>


        </form>

    </div>
<?php require __DIR__ . '/../final-html.php'; ?>