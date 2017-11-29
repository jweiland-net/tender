<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.' . $_EXTKEY,
    'Tender',
    'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:plugin.title'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'tender');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $_EXTKEY . '_tender',
    'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Tender.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_tender'] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_tender_domain_model_tender',
    'EXT:tender/Resources/Private/Language/locallang_csh_tx_tender_domain_model_tender.xlf'
);

// add category to tender table
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    $_EXTKEY,
    'tx_tender_domain_model_tender',
    'category'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_tender_domain_model_tenderdepartment',
    'EXT:tender/Resources/Private/Language/locallang_csh_tx_tender_domain_model_tenderdepartment.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
    'tx_tender_domain_model_tenderdepartment'
);
