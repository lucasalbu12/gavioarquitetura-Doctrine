<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Categoria;
use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Helper\EditFieldTrait;
use Projects\Gavio\Helper\FlashMessageTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class EditaProjeto implements RequisitionHandlerInterface
{
    use FlashMessageTrait;
    use EditFieldTrait;
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


        $this->editField($editorTitulo, $projeto->setTitulo($titulo));
        $this->editField($editorArea, $projeto->setArea($area));
        $this->editField($editorData, $projeto->setAno($ano));
        $this->editField($editorEndereco, $projeto->setEndereco($endereco));
        $this->editField($editorDescricao, $projeto->setDescricao($descricao));

        if(isset($editorCategoia)){
            $novaCategoria = $this->entityManager->getRepository(Categoria::class)->find($categoria);
            $novaCategoria->addProjeto($projeto);
            $this->entityManager->merge($projeto);
            $this->entityManager->flush();
            $this->defineMensagem('success', 'Campo alterado com sucesso');
            header('Location: /lista-projetos?categoriaId=1');
            die();
        }

        if(isset($editorImagem)){
            $imagemAtual = $projeto->getArquivoImagem();
            $imgPath = __DIR__ . '/../../src/Images/projects/head/';
            $this->uploadImage($arquivo, $imgPath);
            unlink($imgPath.$imagemAtual);
            $projeto->setArquivoImagem($arquivo['name']);
            $this->entityManager->flush();
            $this->defineMensagem('success', 'Campo alterado com sucesso');
            header('Location: /lista-projetos?categoriaId=1');
            die();
        }


    }
}