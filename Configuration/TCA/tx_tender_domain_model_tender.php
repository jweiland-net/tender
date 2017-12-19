<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender',
        'label' => 'headline',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'sortby' => 'sorting',
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime'
        ],
        'searchFields' => 'headline,url,tenderdepartment,',
        'iconfile' => 'EXT:tender/Resources/Public/Icons/tx_tender_domain_model_tender.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, headline, url, mediafiles, description, tenderdepartment'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, headline, url, mediafiles, description, tenderdepartment,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime']
    ],
    'palettes' => [
        '1' => ['showitem' => '']
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'items' => [
                    ['', 0]
                ],
                'foreign_table' => 'tx_tender_domain_model_tender',
                'foreign_table_where' => 'AND tx_tender_domain_model_tender.pid=###CURRENT_PID### AND tx_tender_domain_model_tender.sys_language_uid IN (-1,0)'
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255
            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check'
            ]
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.start',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0
            ]
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.stop',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0
            ]
        ],
        'headline' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.headline',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'url' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'wizards' => [
                    '_PADDING' => 2,
                    'link' => [
                        'type' => 'popup',
                        'title' => 'Link',
                        'icon' => 'link_popup.gif',
                        'script' => 'browse_links.php?mode=wizard',
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        'module' => [
                            'name' => 'wizard_link'
                        ]
                    ]
                ],
                'softref' => 'typolink[linkList]'
            ]
        ],
        'tenderdepartment' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.tenderdepartment',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_tender_domain_model_tenderdepartment',
                'items' => [
                    ['', 0]
                ],
                'minitems' => 0,
                'maxitems' => 1
            ]
        ],
        'mediafiles' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.mediafiles',
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'uploadfolder' => 'uploads/tx_tender',
                'show_thumbs' => 0,
                'size' => 4,
                'maxitems' => 9999,
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'] . ',pdf',
                'disallowed' => ''
            ]
        ],
        'description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => [
                    'RTE' => [
                        'icon' => 'wizard_rte2.gif',
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'script' => 'wizard_rte.php',
                        'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script',
                        'module' => [
                            'name' => 'wizard_rte'
                        ]
                    ]
                ]
            ],
            'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]'
        ]
    ]
];
