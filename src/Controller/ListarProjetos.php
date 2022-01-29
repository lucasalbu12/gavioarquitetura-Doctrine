<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Infra\EntityManagerCreator;

class ListarProjetos implements RequisitionHandlerInterface
{
    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeProjetos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeProjetos = $entityManager
            ->getRepository(Projeto::class);
    }

    public function handle(): void
    {
        $projetos = $this->repositorioDeProjetos->findAll();
        $titulo = 'Lista de Projetos';
        $headImgPath = '../../src/Images/projects/head/';

        require __DIR__ . '/../../view/projetos/lista-projetos.php';
        return;
    }
}