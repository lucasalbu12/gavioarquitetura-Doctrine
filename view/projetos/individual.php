<?php include __DIR__ . '/../inicio-html.php'; ?>
<div class="divisao-principal d-flex flex-column justify-content-center">
    <div class="divisao-projeto">
        <div>
            <a href="/lista-projetos" class="btn btn-primary">Voltar</a>
            <div class="d-flex coluna-individual">Id:<?= $projeto->getId(); ?></div>
            <div class="d-flex coluna-individual"><img src="<?= $headImgPath.$projeto->getArquivoImagem();?>" alt="" style="max-width: 250px"></div>
            <div class="d-flex coluna-individual">Endereço: <?= $projeto->getEndereco(); ?></div>
            <div class="d-flex coluna-individual">Descrição:<?= $projeto->getDescricao(); ?></div>



        </div>
        <div>
            <a href="/alterar-projeto?id=<?= $projeto->getId(); ?>" class="btn btn-primary btn-sm">Formulário de Edição</a>
        </div>
    </div>
    <div class="divisao-fotos">

        <form action="/persiste-fotos?id=<?= $projeto->getId(); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-group" type="hidden" name='MAX_FILE_SIZE' value='999999999'>
                <input type="file" name='arquivoImagem[]' required multiple="multiple">
                <input type="submit" name="addFotosProjeto"  value="Adicionar Imagens" class="btn btn-primary btn-sm">
            </div>
        </form>
        <div class="fotos-projeto">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Excluir</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($fotos as $foto):?>
                <tr>
                    <th scope="row"><?= $foto['id']?></th>
                    <td><?= $foto['nome']; ?></td>
                    <td><img src="<?= $galeryImgPath.$foto['nome'];?>" alt="" class="arquivo-foto"></td>
                    <td><a href="/exclui-foto?id=<?= $foto['id']?>&nome=<?= $foto['nome']; ?>&idProjeto=<?= $projeto->getId(); ?>" class="btn btn-primary btn-sm">Excluir</a></td>
                </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
</div>




<?php include __DIR__ . '/../final-html.php'; ?>

