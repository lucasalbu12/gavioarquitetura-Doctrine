<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Categoria;
use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Helper\RenderHtmlTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class FormularioEdicao implements RequisitionHandlerInterface
{
    use RenderHtmlTrait;
    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeCategorias;
    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeProjetos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCategorias = $entityManager->getRepository(Categoria::class);
        $this->repositorioDeProjetos = $entityManager->getRepository(Projeto::class);
    }

    public function handle(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if(is_null($id) || $id === false){
            header('Location: /lista-projetos');
            return;
        }


       $titulo = 'Alterar Projeto';
       $categorias = $this->repositorioDeCategorias->findAll();
       $projeto = $this->repositorioDeProjetos->find($id);

       echo $this->RenderHtml(
           'projetos/formulario-edicao.php',[
               'titulo' => $titulo,
               'categorias' => $categorias,
               'projeto' => $projeto
       ]);
    }
}