<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Infra\EntityManagerCreator;

class ListarProjetos implements RequisitionHandlerInterface
{
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Projeto::class);
    }

    public function handle(): void
    {
        // TODO: Implement handle() method.
    }
}