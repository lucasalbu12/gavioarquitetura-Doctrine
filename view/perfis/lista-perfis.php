<?php include __DIR__ . '/../inicio-html.php'; ?>

    <div class="d-flex flex-column">
        <ul class="list-group">
            <?php foreach ($perfis as $perfil): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div><?= $perfil->getNome(); ?></div>
                    <div><img src="<?= $imgPath.$perfil->getImagem();?>" alt="" style="max-width: 250px"></div>
                    <div style="max-width: 250px"><?= substr($perfil->getDescricao(), 0, 100); ?>...</div>


                    <div>
                        <a href="/formulario-perfil?id=<?= $perfil->getId(); ?>" class="btn btn-primary btn-sm">Alterar</a>
                    </div>

                </li>
            <?php endforeach; ?>
        </ul>
    </div>


<?php include __DIR__ . '/../final-html.php'; ?>