<?php

namespace Projects\Gavio\Entity;

/**
 * @Entity
 * @Table (name="imagens_projeto")
 */
class ImagensProjeto
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private string $id;

    /**
     * @Column (type="string")
     */
    private string $nome;

    /**
     * @ManyToOne (targetEntity="Projeto")
     */
    private $projeto;

    /**
     * @Column (type="string")
     */
    private string $imagePath;
}