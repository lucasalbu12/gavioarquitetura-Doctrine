<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Perfil;
use Projects\Gavio\Helper\RenderHtmlTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class FormularioPerfil implements RequisitionHandlerInterface
{
    use RenderHtmlTrait;

    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDePerfis;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDePerfis = $entityManager->getRepository(Perfil::class);
    }

    public function handle(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if(is_null($id) || $id === false){
            header('Location: /perfis');
            return;
        }
        $perfil = $this->repositorioDePerfis->find($id);
        echo $this->RenderHtml('perfis/formulario.php',[
            'titulo' => 'Editar perfil',
            'perfil' => $perfil
        ]);
    }
}