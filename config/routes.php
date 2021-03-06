<?php

use Projects\Gavio\Controller\{Carrossel,
    EditaPerfil,
    EditaProjeto,
    ExcluiFotoProjeto,
    Exclusao,
    FormularioEdicao,
    FormularioInsercao,
    FormularioLogin,
    FormularioPerfil,
    IndividualProjeto,
    ListaPerfis,
    ListarProjetos,
    Logout,
    PersisteFotosProjeto,
    Persistencia,
    RealizarLogin};

$rotas = [
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizarLogin::class,
    '/logout'=> Logout::class,
    '/lista-projetos' => ListarProjetos::class,
    '/novo-projeto' => FormularioInsercao::class,
    '/salvar-projeto' => Persistencia::class,
    '/excluir-projeto' => Exclusao::class,
    '/alterar-projeto' => FormularioEdicao::class,
    '/editar-projeto' => EditaProjeto::class,
    '/individual-projeto' => IndividualProjeto::class,
    '/persiste-fotos' => PersisteFotosProjeto::class,
    '/exclui-foto' => ExcluiFotoProjeto::class,
    '/perfis' => ListaPerfis::class,
    '/formulario-perfil' => FormularioPerfil::class,
    '/edita-perfil' => EditaPerfil::class,
    '/home' => Carrossel::class
];

return $rotas;