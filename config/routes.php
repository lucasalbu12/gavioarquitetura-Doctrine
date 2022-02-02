<?php

use Projects\Gavio\Controller\{EditaProjeto,
    Exclusao,
    FormularioEdicao,
    FormularioInsercao,
    FormularioLogin,
    ListarProjetos,
    Persistencia,
    RealizarLogin};

$rotas = [
  '/login' => FormularioLogin::class,
    '/realiza-login' => RealizarLogin::class,
    '/lista-projetos' => ListarProjetos::class,
    '/novo-projeto' => FormularioInsercao::class,
    '/salvar-projeto' => Persistencia::class,
    '/excluir-projeto' => Exclusao::class,
    '/alterar-projeto' => FormularioEdicao::class,
    '/editar-projeto' => EditaProjeto::class
];

return $rotas;