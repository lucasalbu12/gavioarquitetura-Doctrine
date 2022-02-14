<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Perfil;
use Projects\Gavio\Helper\EditFieldTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class EditaPerfil implements RequisitionHandlerInterface

{
    use EditFieldTrait;

    private \Doctrine\ORM\EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handle(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $editNome = filter_input(INPUT_POST, 'submitNome');
        $editDescricao = filter_input(INPUT_POST, 'submitDescricao');
        $editImagem = filter_input(INPUT_POST, 'submitImagem');

        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $imagem = $_FILES['imagemA'];

        $perfil = $this->entityManager->getRepository(Perfil::class)->find($id);
        $this->editProfileField($editNome, $perfil->setNome($nome), $perfil);
        $this->editProfileField($editDescricao, $perfil->setdescricao($descricao), $perfil);


        if(isset($editImagem)){

            $imagemAtual = $perfil->getImagem();
            $imgPath = __DIR__ . '/../Images/profile/';
            $this->uploadImage($imagem, $imgPath);
            unlink($imgPath.$imagemAtual);
            $perfil->setImagem($imagem['name']);
            $this->entityManager->flush();
            $this->defineMensagem('success', 'Imagem alterada com sucesso');
            header('Location: /perfis');
            die();
        }

    }
}