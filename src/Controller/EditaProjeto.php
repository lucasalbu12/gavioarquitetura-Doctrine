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

        $imagemPrincipal = filter_input(INPUT_POST, 'arquivoImagem', FILTER_SANITIZE_STRING);

        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
        $categoriaId = filter_input(INPUT_POST, 'categoria_id', FILTER_VALIDATE_INT);
        $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
        $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

        $imgPath = __DIR__ . '/../../src/Images/projects/head/';
        $arquivo = $_FILES['arquivoImagem'];
        $arquivoNovo = explode('.', $arquivo['name']);
        $fileActualExt = strtolower(end($arquivoNovo));
        $allowedExt = ['jpg', 'jpeg', 'png'];


        unlink($imgPath.$imagemPrincipal);


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
        $projeto->setArquivoImagem($arquivo['name']);


            switch ($categoriaId) {
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






        $projeto->setId($id);
        $this->entityManager->merge($projeto);
        $this->entityManager->flush();

        header('Location: /lista-projetos');
    }
}