<?php

defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup(
    'tt_content',
    'list_type',
    'pagination',
    'LLL:EXT:pagination_example/Resources/Private/Language/locallang_be.xlf:plugin_group',
    'after:default'
);
