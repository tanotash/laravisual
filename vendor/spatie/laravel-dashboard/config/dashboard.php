<?php

return [
    /*
     * The dashboard supports these themes:
     *
     * - light: always use light mode
     * - dark: always use dark mode
     * - device: follow the OS preference for determining light or dark mode
     * - auto: use light mode when the sun is up, dark mode when the sun is down
     */
    'theme' => 'dark',

    /*
     * When the dashboard uses the `auto` theme, these coordinates will be used
     * to determine whether the sun is up or down.
     */
    'auto_theme_location' => [
        'lat' => 51.260197,
        'lng' => 4.402771,
    ],

    /*
     * These stylesheets will be loaded when the dashboard is displayed.
     */
    'stylesheets' => [
        'inter' => 'https://rsms.me/inter/inter.css',
    ],
    'tiles' => [
        'charts' => [     
            
            'refresh_interval_in_seconds' => 300, // Default: 300 seconds (5 minutes)
            'charts' => [
                [
                    'type' => 'line',
                    'height' => '1/3',
                    'width' => 'full',
                    'title' => 'Ventas por mes',
                    'datasets' => [
                        [
                            'label' => 'ventas',
                            'data' => [150, 200, 250, 300],
                        ],
                    ],
                    'options' => [
                        'maintainAspectRatio' => false,
                    ],
                ]
            ]
        ],
        
    ],
];
