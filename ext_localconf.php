<?php

defined('TYPO3_MODE') or die();

call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'PaginationExample',
        'Pi1',
        [
            \Derhansen\PaginationExample\Controller\DemoController::class => 'widget',
        ],
        [
            \Derhansen\PaginationExample\Controller\DemoController::class => '',
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'PaginationExample',
        'Pi2',
        [
            \Derhansen\PaginationExample\Controller\DemoController::class => 'controller',
        ],
        [
            \Derhansen\PaginationExample\Controller\DemoController::class => '',
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'PaginationExample',
        'Pi3',
        [
            \Derhansen\PaginationExample\Controller\DemoController::class => 'viewhelper',
        ],
        [
            \Derhansen\PaginationExample\Controller\DemoController::class => '',
        ]
    );
});
