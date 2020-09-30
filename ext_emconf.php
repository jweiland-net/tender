<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'tender',
    'description' => 'tender management',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'author_company' => 'jweiland.net',
    'state' => 'stable',
    'clearCacheOnLoad' => false,
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.17-10.4.99',
            'service_bw2' => ''
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
