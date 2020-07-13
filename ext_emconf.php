<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'tender',
    'description' => 'tender management',
    'category' => 'plugin',
    'author' => 'Yves Poersch',
    'author_email' => 'projects@jweiland.net',
    'author_company' => 'jweiland.net',
    'state' => 'stable',
    'uploadfolder' => 1,
    'createDirs' => 'uploads/tx_tender',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.17-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
