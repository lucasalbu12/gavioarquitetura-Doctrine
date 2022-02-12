<?php

namespace Projects\Gavio\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 * @Table (name="categorias")
 */
class Categoria
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type = "integer")
     */
    private $id;

    /**
     * @Column (type="string")
     */
    private $nome;

    /**
     * @OneToMany (targetEntity="Projeto", mappedBy="categoria")
     */
    private $projetos;

    public function __construct()
    {
        $this->projetos = new ArrayCollection();
    }


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

    public function setNome($nome): self
    {
        $this->nome = $nome;
        return $this;
    }


    public function getProjeto() : Collection
    {
        return $this->projetos;
    }


    public function addProjeto(Projeto $projeto)
    {
        $this->projetos->add($projeto);
        $projeto->setCategoria($this);
        return $this;
    }


}