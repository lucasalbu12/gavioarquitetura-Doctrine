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
    private $nomeCategoria;



    public function __construct()
    {
        $this->projetos = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getNomeCategoria()
    {
        return $this->nomeCategoria;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @param mixed $nomeCategoria
     */
    public function setNomeCategoria($nomeCategoria): void
    {
        $this->nomeCategoria = $nomeCategoria;
    }


}