<?php include __DIR__ . '/../inicio-html.php'; ?>

<a href="/novo-projeto" class="btn btn-primary mb-2">Novo Projeto</a>
<ul class="list-group">
    <?php foreach ($projetos as $projeto): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div><?= $projeto->getId(); ?></div>
            <div><?= $projeto->getTitulo(); ?></div>
            <div><img src="<?= $headImgPath.$projeto->getArquivoImagem();?>" alt="" style="max-width: 250px"></div>


            <div>
                <a href="/alterar-curso?id=<?= $projeto->getId(); ?>" class="btn btn-primary btn-sm">Alterar</a>
                <a href="/excluir-projeto?id=<?= $projeto->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
            </div>

        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__ . '/../final-html.php'; ?>

