<?php

namespace Projects\Gavio\Controller;

use Projects\Gavio\Entity\Usuario;
use Projects\Gavio\Helper\FlashMessageTrait;
use Projects\Gavio\Infra\EntityManagerCreator;

class RealizarLogin implements RequisitionHandlerInterface
{
    /**
     * @var \Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeUsuarios;

    use FlashMessageTrait;

    public function __construct()
{
    $entityManager = (new EntityManagerCreator())->getEntityManager();
    $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
}

    public function handle(): void
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        if(is_null($email) || $email === false){
            $this->defineMensagem('danger', 'O e-mail digitado não é válido.');
            header('Location: /login');
            return;
        }

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );

        $usuario = $this->repositorioDeUsuarios->findOneBy(['email'=>$email]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            $this->defineMensagem('danger', 'E-mail ou senha inválidos.');
            header('Location: /login');
            return;
        }

        $_SESSION['logado'] = true;

        $this->defineMensagem('success', 'Login efetuado com sucesso');
        header('Location: /lista-projetos');

    }
}