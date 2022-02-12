<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Categoria;
use Projects\Gavio\Helper\RenderHtmlTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class FormularioInsercao implements RequisitionHandlerInterface
{
    use RenderHtmlTrait;

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

        echo $this->RenderHtml('projetos/formulario.php',[
            'titulo' => $titulo,
            'categorias' => $categorias
        ]);
    }
}