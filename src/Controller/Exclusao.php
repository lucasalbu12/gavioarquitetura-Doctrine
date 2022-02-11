<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Infra\EntityManagerCreator;

class Exclusao implements RequisitionHandlerInterface
{

    private \Doctrine\ORM\EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handle(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if(is_null($id) || $id === false){
            header("Location: /listar-projetos");
            return;
        }

       $caminhoImagem = __DIR__ . "/../../src/Images/projects/head/";

        $projeto = $this->entityManager->getReference(Projeto::class, $id);
        $imagem = $this->entityManager->find(Projeto::class, $projeto);
        unlink($caminhoImagem.$imagem->getArquivoImagem());
        $this->entityManager->remove($projeto);
        $this->entityManager->flush();

        header('Location: /lista-projetos');
        die();

    }
}