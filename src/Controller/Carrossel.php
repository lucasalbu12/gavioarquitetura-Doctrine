<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Helper\RenderHtmlTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class Carrossel implements RequisitionHandlerInterface
{
    use RenderHtmlTrait;

    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeProjetos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeProjetos = $entityManager->getRepository(Projeto::class);
    }

    public function handle(): void
    {
        echo $this->RenderHtml('public/pages/main.php',[
''
        ]);
    }
}