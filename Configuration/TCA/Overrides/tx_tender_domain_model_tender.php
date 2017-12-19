<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'tender',
    'tx_tender_domain_model_tender',
    'category',
    [
        'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang.xlf:tx_tender_domain_model_tender.categories',
        'fieldConfiguration' => [
            'minitems' => 0,
            'maxitems' => 1
        ]
    ]
);
