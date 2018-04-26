<?php

declare (strict_types = 1);

namespace MVC\Model;

class Template
{
    public function render(string $template, $params = [])
    {
       extract($params);

        $level = ob_get_level();
        ob_start();

        include __DIR__ .$template;
        $content = ob_get_clean();
        
        return $content;
    }
} 