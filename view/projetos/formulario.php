<?php require __DIR__ . '/../inicio-html.php'; ?>
<div class="form-group">
    <a href="/lista-projetos">Voltar</a>

    <form enctype='multipart/form-data' action="/salvar-projeto" method="post">


        <?php foreach($categorias as $categoria): ?>
            <p><?= $categoria->getNomeCategoria(); ?></p>
            <input type="radio" name="categoria_id" class="form-group" value="<?= $categoria->getId(); ?>">
        <?php endforeach?>


        <div class="form-group"><input type="text" name='titulo' placeholder='Insira o nome do projeto' class="form-group"></div>
        <div class="form-group"><input type="text" name='area' placeholder='Insira a área' class="form-group"></div>
        <div class="form-group"><input type="text" name='ano' placeholder='Insira a data' class="form-group"></div>
        <div class="form-group"><input type="text" name='endereco' placeholder='Insira a localização' class="form-group"></div>
        <div class="form-group"><textarea name="descricao" id="descricao" placeholder='Descrição do projeto' class="form-group"></textarea></div>
        <input type="hidden" name='MAX_FILE_SIZE' value='999999999'>
        <div class="form-group"><input type="file" name='arquivoImagem' required></div>
        <div class="form-group"> <button class="btn btn-primary">Salvar</button></div>
    </form>

</div>

<?php require __DIR__ . '/../final-html.php'; ?>