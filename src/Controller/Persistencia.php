<?php

namespace Projects\Gavio\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Projects\Gavio\Entity\Categoria;
use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Helper\EditFieldTrait;
use Projects\Gavio\Helper\FlashMessageTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class Persistencia implements RequisitionHandlerInterface
{
    use FlashMessageTrait;
    use EditFieldTrait;

    private EntityManagerInterface $entityManager;
    private $repositorioDeCategorias;

    public function __construct()
{
    $entityManager = (new EntityManagerCreator())->getEntityManager();
    $this->repositorioDeCategorias = $entityManager->getRepository(Categoria::class);
    $this->entityManager = (new EntityManagerCreator())->getEntityManager();
}

    public function handle(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $imagemPrincipal = filter_input(INPUT_POST, 'imagemAtual', FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $arquivo = $_FILES['arquivoImagem'];

        $imgPath = __DIR__ . '/../../src/Images/projects/head/';
        $this->uploadImage($arquivo, $imgPath);


        $projeto = new Projeto();
        $projeto->setTitulo($titulo);
        $projeto->setArea($area);
        $projeto->setAno($ano);
        $projeto->setEndereco($endereco);
        $projeto->setDescricao($descricao);

        if(isset($categoria)){
            $novaCategoria = $this->entityManager->getRepository(Categoria::class)->find($categoria);
            $novaCategoria->addProjeto($projeto);
        } else{
            $novaCategoria = $this->entityManager->getRepository(Categoria::class)->find(1);
            $novaCategoria->addProjeto($projeto);
        }



        if(!is_null($id) && $id !== false){
            $projeto->setId($id);

            if(!isset($arquivo)){
                $projeto->setArquivoImagem($imagemPrincipal);
            } else{
                $projeto->setArquivoImagem($arquivo['name']);
                unlink($imgPath.$imagemPrincipal);
            }
            $this->entityManager->merge($projeto);
        } else{

            $projeto->setArquivoImagem($arquivo['name']);
            $this->entityManager->persist($projeto);

        }


        $this->defineMensagem('success', 'Projeto adicionado com sucesso');
        $this->entityManager->flush();

        header('Location: /lista-projetos?categoriaId='.$categoria);

    }
}