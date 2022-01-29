<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Categoria;
use Projects\Gavio\Infra\EntityManagerCreator;

class FormularioInsercao implements RequisitionHandlerInterface
{

    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeCategorias;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCategorias = $entityManager->getRepository(Categoria::class);
    }

    public function handle(): void
    {
        $titulo = 'Novo Projeto';
        $categorias = $this->repositorioDeCategorias->findAll();
        require __DIR__ . '/../../view/projetos/formulario.php';
        return;
    }
}