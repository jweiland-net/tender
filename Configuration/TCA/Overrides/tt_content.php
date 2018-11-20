<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['tender_tender'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'tender_tender',
    'FILE:EXT:tender/Configuration/FlexForms/Tender.xml'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.tender',
    'Tender',
    'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:plugin.title'
);
