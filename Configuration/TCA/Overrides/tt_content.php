<?php

defined('TYPO3_MODE') or die();

/**
 * Plugins
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'PaginationExample',
    'Pi1',
    'LLL:EXT:pagination_example/Resources/Private/Language/locallang_be.xlf:plugin.pi1.title',
    null,
    'pagination'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'PaginationExample',
    'Pi2',
    'LLL:EXT:pagination_example/Resources/Private/Language/locallang_be.xlf:plugin.pi2.title',
    null,
    'pagination'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'PaginationExample',
    'Pi3',
    'LLL:EXT:pagination_example/Resources/Private/Language/locallang_be.xlf:plugin.pi3.title',
    null,
    'pagination'
);
