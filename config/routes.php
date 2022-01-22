<?php

use Projects\Gavio\Controller\{FormularioLogin, RealizarLogin};

$rotas = [
  '/login' => FormularioLogin::class,
    '/realiza-login' => RealizarLogin::class
];

return $rotas;