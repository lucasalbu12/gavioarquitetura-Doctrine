<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Categoria;
use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Helper\RenderHtmlTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class ListarProjetos implements RequisitionHandlerInterface
{
    use RenderHtmlTrait;
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
        $categoriaId = filter_input(INPUT_GET, 'categoriaId', FILTER_VALIDATE_INT);

        $categorias = $this->repositorioDeCategorias->findBy([
            'id' => $categoriaId
        ]);
        $projetos = $this->repositorioDeProjetos->findBy([
            'categoria' => $categorias
        ]);

        echo $this->RenderHtml('projetos/lista-projetos.php', [
            'titulo' => 'Lista de projetos',
            'headImgPath' => '../../src/Images/projects/head/',
            'projetos' => $projetos,
            'categorias' => $categorias,
            'categoriaId' => $categoriaId,
            'residencialId' => 1,
            'interioresId' => 2,
            'comercialId' => 3
        ]);
    }
}