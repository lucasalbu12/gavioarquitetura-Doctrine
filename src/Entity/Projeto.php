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
     * @ManyToOne(targetEntity="Categoria")
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
    private $data;
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
    private $imagemCapa;
        /**
     * @Column (type="boolean")
     */
    private $carrossel;


}