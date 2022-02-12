<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Categoria;
use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Infra\EntityManagerCreator;

class EditaProjeto implements RequisitionHandlerInterface
{

    private \Doctrine\ORM\EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();

    }

    public function handle(): void
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        /* INPUTS SUBMIT */

        $editorCategoia = filter_input(INPUT_POST, 'editorCategoria');
        $editorTitulo = filter_input(INPUT_POST, 'editorTitulo');
        $editorArea = filter_input(INPUT_POST, 'editorArea');
        $editorData = filter_input(INPUT_POST, 'editorData');
        $editorEndereco = filter_input(INPUT_POST, 'editorEndereco');
        $editorDescricao = filter_input(INPUT_POST, 'editorDescricao');
        $editorImagem = filter_input(INPUT_POST, 'editorImagem');


        /* INPUTS CONTEÚDO */

        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $arquivo = $_FILES['arquivoImagem'];

        $projeto = $this->entityManager->getRepository(Projeto::class)->find($id);


        /* SUBMITS */

        if(isset($editorTitulo)){
            $projeto->setTitulo($titulo);
            $this->entityManager->flush();
            header('Location: /lista-projetos');
            die();
        }

        if(isset($editorCategoia)){
            $novaCategoria = $this->entityManager->getRepository(Categoria::class)->find($categoria);
            $novaCategoria->addProjeto($projeto);
            $this->entityManager->merge($projeto);
            $this->entityManager->flush();
            header('Location: /lista-projetos?categoriaId=1');
            die();
        }

        if(isset($editorArea)){
            $projeto->setArea($area);
            $this->entityManager->flush();
            header('Location: /lista-projetos?categoriaId=1');
            die();
        }

        if(isset($editorData)){
            $projeto->setAno($ano);
            $this->entityManager->flush();
            header('Location: /lista-projetos?categoriaId=1');
            die();
        }

        if(isset($editorEndereco)){
            $projeto->setEndereco($endereco);
            $this->entityManager->flush();
            header('Location: /lista-projetos?categoriaId=1');
            die();
        }

        if(isset($editorDescricao)){
            $projeto->setDescricao($descricao);
            $this->entityManager->flush();
            header('Location: /lista-projetos?categoriaId=1');
            die();
        }

        if(isset($editorImagem)){
            $imagemAtual = $projeto->getArquivoImagem();

            $imgPath = __DIR__ . '/../../src/Images/projects/head/';

            $arquivoNovo = explode('.', $arquivo['name']);
            $fileActualExt = strtolower(end($arquivoNovo));
            $allowedExt = ['jpg', 'jpeg', 'png'];



            if($arquivoNovo[sizeof($arquivoNovo)-1] != in_array($fileActualExt, $allowedExt)){
                die("Você não pode fazer o upload deste tipo de arquivo");
            } else{
                move_uploaded_file($arquivo['tmp_name'], $imgPath.$arquivo['name']);
                unlink($imgPath.$imagemAtual);


            }

            $projeto->setArquivoImagem($arquivo['name']);
            $this->entityManager->flush();
            header('Location: /lista-projetos?categoriaId=1');
            die();
        }




//
//
//
//
//
//
//        $projeto->setId($id);
//        $this->entityManager->merge($projeto);
//        $this->entityManager->flush();
//
//        header('Location: /lista-projetos');
    }
}