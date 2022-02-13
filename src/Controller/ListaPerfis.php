<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Perfil;
use Projects\Gavio\Helper\RenderHtmlTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class ListaPerfis implements RequisitionHandlerInterface
{
    use RenderHtmlTrait;

    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositoriodePerfis;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositoriodePerfis = $entityManager->getRepository(Perfil::class);
    }

    public function handle(): void
    {
        $imgPath = '../../src/Images/profile/';
        $perfis = $this->repositoriodePerfis->findAll();

        echo $this->RenderHtml('perfis/lista-perfis.php', [
            'titulo' => 'Lista de perfis',
            'imgPath' => $imgPath,
            'perfis' => $perfis
        ]);
    }
}