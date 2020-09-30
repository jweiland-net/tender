<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'JWeiland.tender',
    'Tender',
    [
        'Tender' => 'list, show'
    ]
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['tenderUpdateMediaFilesToFal']
    = \JWeiland\Tender\Updates\TenderMediaFilesUpdateWizard::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['tenderRenameCategoryToCategories']
    = \JWeiland\Tender\Updates\RenameCategoryToCategoriesUpdateWizard::class;
