<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Helper\RenderHtmlTrait;

class FormularioLogin implements RequisitionHandlerInterface
{
    use RenderHtmlTrait;

    public function handle(): void
    {
        $titulo = "Login";

        echo $this->RenderHtml('login/formulario.php',[
            'titulo' => $titulo
        ]);
    }
}