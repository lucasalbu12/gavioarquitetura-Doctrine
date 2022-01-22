<?php

namespace Projects\Gavio\Entity;

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

    /**
     * @OneToMany(targetEntity="Projeto", mappedBy="categoria")
     */
    private $projetos;
}