<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_tender_domain_model_tender',
    'EXT:tender/Resources/Private/Language/locallang_csh_tx_tender_domain_model_tender.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_tender_domain_model_tenderdepartment',
    'EXT:tender/Resources/Private/Language/locallang_csh_tx_tender_domain_model_tenderdepartment.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tender_domain_model_tender');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tender_domain_model_tenderdepartment');
