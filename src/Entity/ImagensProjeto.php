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


    public function getNome(): string
    {
        return $this->nome;
    }


    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }


    public function getProjeto(): Projeto
    {
        return $this->projeto;
    }


    public function setProjeto(Projeto $projeto): self
    {
        $this->projeto = $projeto;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}