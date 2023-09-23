<?php

return [
    'ImageOptions' => [
        'width' => [
            'label' => "Largeur",
            'type' => "text",
            'span' => 'left',
        ],
        'height' => [
            'label' => "hauteur",
            'type' => "text",
            'span' => 'right',
        ],
        'crop' => [
            'label' => "Comment ajuster l'image ?",
            'type' => 'dropdown',
            'span' => 'left',
            'options' => [
                'exact' => "Exacte",
                'portrait' => "Portrait",
                'landscape' => "Paysage",
                'auto' => "automatique",
                'fit' => 'Tenir',
                'crop' => "Couper",
            ],
        ],
        'gravity' => [
            'label' => "Gravity",
            'type' => 'dropdown',
            'span' => 'right',
            'options' => [],
        ],
    ],
    'image' => [
        'baseCrop' => [
            'exact' => "Exacte",
            'portrait' => "Portrait",
            'landscape' => "Paysage",
            'auto' => "automatique",
            'fit' => 'Tenir',
            'crop' => "Couper",
        ]
    ],];
