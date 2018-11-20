<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.tender',
    'Tender',
    'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:plugin.title'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('tender', 'Configuration/TypoScript', 'tender');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'tender_tender',
    'FILE:EXT:tender/Configuration/FlexForms/Tender.xml'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['tender_tender'] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_tender_domain_model_tender',
    'EXT:tender/Resources/Private/Language/locallang_csh_tx_tender_domain_model_tender.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_tender_domain_model_tenderdepartment',
    'EXT:tender/Resources/Private/Language/locallang_csh_tx_tender_domain_model_tenderdepartment.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
    'tx_tender_domain_model_tenderdepartment'
);
