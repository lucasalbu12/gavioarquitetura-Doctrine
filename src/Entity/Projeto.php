<?php

namespace Projects\Gavio\Entity;

/**
 * @Entity
 * @Table (name="projetos")
 */
class Projeto
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private $id;

    /**
     * @Column (type="string")
     */
    private $categoria;

    /**
     * @Column (type="string")
     */
    private $titulo;
    /**
     * @Column (type="string")
     */
    private $area;
    /**
     * @Column (type="string")
     */
    private $ano;
        /**
     * @Column (type="string")
     */
    private $endereco;
        /**
     * @Column (type="text")
     */
    private $descricao;

    /**
     * @Column (type="string")
     */
    private $arquivoImagem;

    /**
     * @OneToMany (targetEntity="ImagensProjeto", mappedBy="projeto")
     */
    private $fotosProjeto;


    private $carrossel;

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function setArea($area): void
    {
        $this->area = $area;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano): void
    {
        $this->ano = $ano;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getImagemCapa()
    {
        return $this->imagemCapa;
    }

    public function setImagemCapa($imagemCapa): void
    {
        $this->imagemCapa = $imagemCapa;
    }

    public function getCarrossel()
    {
        return $this->carrossel;
    }

    public function setCarrossel($carrossel): void
    {
        $this->carrossel = $carrossel;
    }

    public function getFotosProjeto()
    {
        return $this->fotosProjeto;
    }

    public function setFotosProjeto($fotosProjeto): void
    {
        $this->fotosProjeto = $fotosProjeto;
    }




    public function getArquivoImagem()
    {
        return $this->arquivoImagem;
    }


    public function setArquivoImagem($arquivoImagem): void
    {
        $this->arquivoImagem = $arquivoImagem;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}