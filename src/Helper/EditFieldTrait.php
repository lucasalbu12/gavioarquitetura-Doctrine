<?php

namespace Projects\Gavio\Helper;

trait EditFieldTrait
{
    use FlashMessageTrait;
    public function editField($editor, $function)
    {
        if(isset($editor)){
            $function;
            $this->entityManager->flush();
            $this->defineMensagem('success', 'Campo alterado com sucesso');
            header('Location: /lista-projetos?categoriaId=1');
            die();
        }
    }
}