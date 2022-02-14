<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\ImagensProjeto;
use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Infra\EntityManagerCreator;

class PersisteFotosProjeto implements RequisitionHandlerInterface
{

    private \Doctrine\ORM\EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handle(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $arquivos = $_FILES['arquivoImagem'];
        $addFoto = filter_input(INPUT_POST, 'addFotosProjeto', FILTER_SANITIZE_STRING);

        $projeto = $this->entityManager->getRepository(Projeto::class)->find($id);


        if(isset($addFoto)){
            foreach ($arquivos['name'] as $k => $v):

                $arquivoNovo = explode('.', $v);
                $fileActualExt = strtolower(end($arquivoNovo));
                $allowed = ['jpg', 'jpeg', 'png'];
                $fotoPath = __DIR__ . '/../../src/Images/projects/imgs/';

                if($arquivoNovo[sizeof($arquivoNovo)-1] != in_array($fileActualExt, $allowed)){
                    die("Você não pode fazer o upload deste tipo de arquivo");
                } else{
                    move_uploaded_file($arquivos['tmp_name'][$k], $fotoPath.$v);

                }
                endforeach;

            foreach ($arquivos['name'] as $arquivo){
                $fotos = new ImagensProjeto();
                $fotos->setNome($arquivo);
                $this->entityManager->persist($fotos);
                $projeto->addFotosProjeto($fotos);

            }
            $this->entityManager->flush();
        }


        header('Location: /individual-projeto?id='.$id);
        die();
    }
}