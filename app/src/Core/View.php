<?php

namespace App\Core;

/**
 * Class View
 *
 * @package App\Core
 */
class View
{
    /**
     * @param string $template
     * @param string $baseLayout
     * @param array $data
     */
    public function render(string $template, string $baseLayout, array $data = [])
    {
        extract($data);

        include TEMPLATE_PATH . $baseLayout;
    }
}
