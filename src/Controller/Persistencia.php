<?php

namespace Projects\Gavio\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Projects\Gavio\Entity\Categoria;
use Projects\Gavio\Entity\Projeto;
use Projects\Gavio\Infra\EntityManagerCreator;

class Persistencia implements RequisitionHandlerInterface
{
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
        $imagemPrincipal = filter_input(INPUT_POST, 'imagemAtual', FILTER_SANITIZE_STRING);

        $categoriaId = filter_input(INPUT_POST, 'categoria_id', FILTER_VALIDATE_INT);
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

        $tituloAtual = filter_input(INPUT_POST, 'tituloAtual', FILTEr);


        $imgPath = __DIR__ . '/../../src/Images/projects/head/';
        $arquivo = $_FILES['arquivoImagem'];
        $arquivoNovo = explode('.', $arquivo['name']);
        $fileActualExt = strtolower(end($arquivoNovo));
        $allowedExt = ['jpg', 'jpeg', 'png'];

        if($arquivoNovo[sizeof($arquivoNovo)-1] != in_array($fileActualExt, $allowedExt)){
            die("Você não pode fazer o upload deste tipo de arquivo");
        } else{
            move_uploaded_file($arquivo['tmp_name'], $imgPath.$arquivo['name']);
        }


        $projeto = new Projeto();


        $projeto->setTitulo($titulo);
        $projeto->setArea($area);
        $projeto->setAno($ano);
        $projeto->setEndereco($endereco);
        $projeto->setDescricao($descricao);

        switch ($categoriaId){
            case $categoriaId === 1:
                $projeto->setCategoria('Residencial');
                break;
            case $categoriaId === 2:
                $projeto->setCategoria('Interiores');
                break;
            case $categoriaId === 3:
                $projeto->setCategoria('Comercial');
                break;
        }

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

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


        $this->entityManager->flush();

        header('Location: /lista-projetos');

    }
}