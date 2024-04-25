<?php

use CakeLte\Style\Header;
use CakeLte\Style\Sidebar;

return [
    'CakeLte' => [
        'app-name' => 'Gal<b>ery</b>',
        'app-logo' => 'CakeLte.cake.icon.svg',

        'small-text' => false,
        'dark-mode' => true,
        'layout-boxed' => false,

        'header' => [
            'fixed' => true,
            'border' => false,
            'style' => header::STYLE_DARK,
            'dropdown-legacy' => true,
        ],

        'sidebar' => [
            'fixed' => true,
            'collapsed' => false,
            'mini' => true,
            'mini-md' => false,
            'mini-xs' => false,
            'style' => Sidebar::STYLE_DARK_DANGER,

            'flat-style' => false,
            'legacy-style' => true,
            'compact' => false,
            'child-indent' => false,
            'child-hide-collapse' => false,
            'disabled-auto-expand' => false,
        ],

        'footer' => [
            'fixed' => true,
        ],
    ],
];