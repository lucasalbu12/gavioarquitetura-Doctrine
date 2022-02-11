<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\ImagensProjeto;
use Projects\Gavio\Infra\EntityManagerCreator;

class ExcluiFotoProjeto implements RequisitionHandlerInterface
{

    private \Doctrine\ORM\EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handle(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
        $idProjeto = filter_input(INPUT_GET, 'idProjeto', FILTER_VALIDATE_INT);

        if(is_null($id) || $id === false){
            header("Location: /listar-projetos");
            return;
        }

        $galleryImgPath = __DIR__ . "/../../src/Images/projects/imgs/";
        $foto = $this->entityManager->getReference(ImagensProjeto::class, $id);
        $exclusao = $this->entityManager->find(ImagensProjeto::class, $foto);
        unlink($galleryImgPath.$nome);
        $this->entityManager->remove($exclusao);
        $this->entityManager->flush();

        header('Location: /individual-projeto?id='.$idProjeto);
    }
}