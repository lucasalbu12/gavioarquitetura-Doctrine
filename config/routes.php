<?php

use Projects\Gavio\Controller\{Exclusao,
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
    '/excluir-projeto' => Exclusao::class
];

return $rotas;