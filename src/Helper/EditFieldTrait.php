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

    public function editProfileField($editor, $function, $entity)
    {
        if(isset($editor)){
            $function;
            $this->entityManager->merge($entity);
            $this->entityManager->flush();
            $this->defineMensagem('success', 'Campo alterado com sucesso');
            header('Location: /perfis');
            die();
        }
    }

    public function uploadImage($inputImage, string $imgPath)
    {
        $inputImage;
        $arquivoNovo = explode('.', $inputImage['name']);
        $fileActualExt = strtolower(end($arquivoNovo));
        $allowedExt = ['jpg', 'jpeg', 'png'];

        if($arquivoNovo[sizeof($arquivoNovo)-1] != in_array($fileActualExt, $allowedExt)){
            die("Você não pode fazer o upload deste tipo de arquivo");
        } else{
            move_uploaded_file($inputImage['tmp_name'], $imgPath.$inputImage['name']);
        }
    }

}