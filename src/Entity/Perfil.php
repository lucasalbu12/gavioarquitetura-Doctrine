<?php

namespace Projects\Gavio\Entity;

/**
 * @Entity
 * @Table (name="perfis")
 */
class Perfil
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
    private $nome;

    /**
     * @Column (type="text")
     */
    private $descricao;

    /**
     * @Column (type="string")
     */
    private $imagem;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome): void
    {
        $this->nome = $nome;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }


    public function getImagem()
    {
        return $this->imagem;
    }


    public function setImagem($imagem): void
    {
        $this->imagem = $imagem;
    }
}