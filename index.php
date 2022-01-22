<?php

require __DIR__ . '/vendor/autoload.php';

use Projects\Gavio\Controller\FormularioLogin;
use Projects\Gavio\Controller\RequisitionHandlerInterface;

$pathInfo = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/config/routes.php';

if(!array_key_exists($pathInfo, $rotas)){
    echo "Erro 404";
    exit();
}

$classeControladora = $rotas[$pathInfo];
/**
 * @var RequisitionHandlerInterface $controlador
 */
$controlador = new $classeControladora();
$controlador->handle();
