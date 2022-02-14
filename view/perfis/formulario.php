<?php require __DIR__ . '/../inicio-html.php'; ?>

<form enctype='multipart/form-data' action="/edita-perfil?id=<?=$perfil->getId();?>" method="post">
    <div class="form-group">
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome de perfil" value="<?= $perfil->getNome(); ?>">
        <input type="submit" name="submitNome" class="btn btn-primary btn-sm" value="Editar nome">
    </div>
    <div class="form-group">
        <textarea name="descricao" id="descricao" style="min-width: 350px">
            <?= $perfil->getDescricao(); ?>
        </textarea>
        <input type="submit" name="submitDescricao" class="btn btn-primary btn-sm" value="Editar descrição">
    </div>
    <div class="form-group">
        <input class="form-group" type="hidden" name='MAX_FILE_SIZE' value='999999999'>
        <input type="file" name="imagemA">
        <input type="submit" name="submitImagem" class="btn btn-primary btn-sm" value="Editar imagem">
    </div>
</form>

<?php require __DIR__ . '/../final-html.php'; ?>
