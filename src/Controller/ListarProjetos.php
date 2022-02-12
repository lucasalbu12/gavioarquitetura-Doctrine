<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Categoria;
use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Infra\EntityManagerCreator;

class ListarProjetos implements RequisitionHandlerInterface
{
    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeProjetos;
    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeCategorias;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeProjetos = $entityManager
            ->getRepository(Projeto::class);
        $this->repositorioDeCategorias = $entityManager
            ->getRepository(Categoria::class);
    }

    public function handle(): void
    {
        $residencialId = 1;
        $interioresId = 2;
        $comercialId = 3;
        $categoriaId = filter_input(INPUT_GET, 'categoriaId', FILTER_VALIDATE_INT);

        $categorias = $this->repositorioDeCategorias->findBy([
            'id' => $categoriaId
        ]);
        $projetos = $this->repositorioDeProjetos->findBy([
            'categoria' => $categorias
        ]);
        $titulo = 'Lista de Projetos';
        $headImgPath = '../../src/Images/projects/head/';
        require __DIR__ . '/../../view/projetos/lista-projetos.php';
    }
}