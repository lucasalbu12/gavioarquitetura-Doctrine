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
    private $imagePath;
}