<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
        <link rel="stylesheet" href="../resources/css/formulario-edicao.css">
        <link rel="stylesheet" href="../resources/css/projeto-individual.css">
    </head>
    <body>
    <?php if(isset($_SESSION['logado'])): ?>
        <nav class="navbar navbar-dark bg-dark mb-2">
            <a href="/lista-projetos" class="navbar-brand">Home</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="/logout" class="nav-link">Sair</a>
                </li>
                <li class="nav-item">
                    <a href="/lista-projetos" class="nav-link active">Projetos</a>
                </li>
                <li class="nav-item">
                    <a href="/perfis" class="nav-link active">Perfis</a>
                </li>
            </ul>

        </nav>
    <?php endif; ?>
    <div class="container">
    <div class="jumbotron">
    <h1><?= $titulo; ?></h1>
    </div>

    <?php if(isset($_SESSION['mensagem'])): ?>
        <div class="alert alert-<?= $_SESSION['tipo_mensagem'];?>">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']);
        endif;
    ?>