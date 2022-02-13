<?php include __DIR__ . '/../inicio-html.php'; ?>

<a href="/novo-projeto" class="btn btn-primary mb-2">Novo Projeto</a>
<div class="d-flex flex-column">
    <div class="botoes-categoria align-self-center">
        <a href="/lista-projetos?categoriaId=<?= $residencialId;?>" class="btn btn-primary btn-sm">Residencial</a>
        <a href="/lista-projetos?categoriaId=<?= $interioresId;?>" class="btn btn-primary btn-sm">Interiores</a>
        <a href="/lista-projetos?categoriaId=<?= $comercialId;?>" class="btn btn-primary btn-sm">Comercial</a>
    </div>
    <ul class="list-group">
        <?php foreach ($projetos as $projeto): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div><?= $projeto->getId(); ?></div>
                <div><?= $projeto->getTitulo(); ?></div>
                <div><img src="<?= $headImgPath.$projeto->getArquivoImagem();?>" alt="" style="max-width: 250px"></div>


                <div>
                    <a href="/individual-projeto?id=<?= $projeto->getId(); ?>" class="btn btn-primary btn-sm">Alterar</a>
                    <a href="/excluir-projeto?id=<?= $projeto->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                </div>

            </li>
        <?php endforeach; ?>
    </ul>
</div>


<?php include __DIR__ . '/../final-html.php'; ?>

