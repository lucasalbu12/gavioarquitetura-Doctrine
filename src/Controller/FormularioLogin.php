<?php

namespace Projects\Gavio\Controller;

class FormularioLogin implements RequisitionHandlerInterface
{

    public function handle(): void
    {
        $titulo = "Login";
        require __DIR__ . '/../../view/login/formulario.php';
        return;
    }
}