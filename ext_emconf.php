<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Example extension for pagination in TYPO3 10.4+',
    'description' => '',
    'category' => 'fe',
    'author' => 'Torben Hansen',
    'author_email' => 'derhansen@gmail.com',
    'state' => 'stable',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-0.0.0',
            'php' => '7.2.0-7.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
