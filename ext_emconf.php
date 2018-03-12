<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'tender',
    'description' => 'tender management',
    'category' => 'plugin',
    'author' => 'Yves Poersch',
    'author_email' => 'projects@jweiland.net',
    'author_company' => 'jweiland.net',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => 1,
    'createDirs' => 'uploads/tx_tender',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '1.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99'
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
