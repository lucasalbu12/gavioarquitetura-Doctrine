<?php

namespace Projects\Gavio\Helper;

trait RenderHtmlTrait
{
    public function RenderHtml(string $templatePath, array $data) :string
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../../view/' . $templatePath;
        $html = ob_get_clean();

        return $html;
    }
}