<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\ImagensProjeto;
use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Helper\RenderHtmlTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class IndividualProjeto implements RequisitionHandlerInterface
{

    use RenderHtmlTrait;

    private \Doctrine\ORM\EntityManagerInterface $repositorioDeProjetos;



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

        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $repositorioDeProjetos = $entityManager->getRepository(Projeto::class);
        $headImgPath = '../../src/Images/projects/head/';
        $galeryImgPath = '../../src/Images/projects/imgs/';
        $projeto = $repositorioDeProjetos->find($id);
        $titulo = $projeto->getTitulo();

        $fotos = $projeto
            ->getFotosProjeto()
            ->map(function (ImagensProjeto $foto){


                $array = [
                    'nome' => $foto->getNome(),
                    'id' => $foto->getId()
                ];
                return $array;
            });

        echo $this->RenderHtml('projetos/individual.php',[
            'id' => $id,
            'headImgPath' => $headImgPath,
            'galeryImgPath' => $galeryImgPath,
            'projeto' => $projeto,
            'titulo' => $titulo,
            'fotos' => $fotos
        ]);
    }
}