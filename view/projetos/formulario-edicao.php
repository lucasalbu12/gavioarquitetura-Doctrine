<?php require __DIR__ . '/../inicio-html.php'; ?>
    <div class="form-group formulario-edicao">
        <a href="/individual-projeto?id=<?= $projeto->getId(); ?>" class="btn btn-primary">Voltar</a>

        <form enctype='multipart/form-data' action="/editar-projeto?id=<?= $projeto->getId(); ?>" method="post" class="d-flex flex-column">


            <div class="form-group input-categorias">
                <?php foreach($categorias as $categoria): ?>
                    <?= $categoria->getNomeCategoria(); ?>
                    <input class="form-group" type="radio" name="categoria_id" class="form-group" value="<?= $categoria->getId(); ?>">
                <?php endforeach; ?>
                <input type="submit" class="form-group" value="Editar categoria" name="editorCategoria" class="btn btn-primary" readonly>
            </div>

            <input type="text" name='imagemAtual' style="visibility: hidden" value='<?= isset($projeto) ? $projeto->getArquivoImagem(): ''; ?>' >

            <div class="form-group">
                <input type="text" name='titulo' value='<?= isset($projeto) ? $projeto->getTitulo(): ''; ?>' >
                <input type="submit" value="Editar título" name="editorTitulo" class="btn btn-primary">
            </div>
            <div class="form-group">
                <input type="text" name='area' value='<?= $projeto->getArea(); ?>' class="form-group">
                <input type="submit" name="editorArea" value="Editar área" class="btn btn-primary">
            </div>
            <div class="form-group">
                <input type="text" name='ano' value='<?= $projeto->getAno(); ?>' class="form-group">
                <input type="submit" name="editorAno" value="Editar data" class="btn btn-primary">
            </div>
            <div class="form-group">
                <input type="text" name='endereco' value='<?= $projeto->getEndereco(); ?>' class="form-group">
                <input type="submit" name="editorEndereco"  value="Editar endereço" class="btn btn-primary">
            </div>
            <div class="form-group">
                <textarea name="descricao" id="descricao" class="form-group">
                    <?= $projeto->getDescricao(); ?>
                </textarea>
                <input type="submit" name="editorDescricao"  value="Editar descrição" class="btn btn-primary">
            </div>


            <div class="form-group">
                <input class="form-group" type="hidden" name='MAX_FILE_SIZE' value='999999999'>
                <input type="file" name='arquivoImagem'>
                <input type="submit" name="editorImagem"  value="Editar imagem" class="btn btn-primary">
            </div>




            <button class="btn btn-primary btn-default">Salvar</button>


        </form>

    </div>
<?php require __DIR__ . '/../final-html.php'; ?>