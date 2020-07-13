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
        'versioningWS' => true,
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
        '1' => [
            'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, headline, url, mediafiles, description, tenderdepartment,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access, 
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access'
        ]
    ],
    'palettes' => [
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ]
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_tender_domain_model_tender',
                'foreign_table_where' => 'AND tx_tender_domain_model_tender.pid=###CURRENT_PID### AND tx_tender_domain_model_tender.sys_language_uid IN (-1,0)',
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => true,
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
        'cruser_id' => [
            'label' => 'cruser_id',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 16,
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 16,
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
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
                'renderType' => 'inputLink',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim',
            ]
        ],
        'tenderdepartment' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.tenderdepartment',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_tender_domain_model_tenderdepartment',
                'items' => [
                    ['', 0]
                ],
                'minitems' => 0,
                'maxitems' => 1
            ]
        ],
        'mediafiles' => [
            'exclude' => true,
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.mediafiles',
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'uploadfolder' => 'uploads/tx_tender',
                'size' => 4,
                'maxitems' => 9999,
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'] . ',pdf',
                'disallowed' => '',
                'fieldWizard' => [
                    'fileThumbnails' => [
                        'disabled' => true
                    ]
                ]
            ]
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:tender/Resources/Private/Language/locallang_db.xlf:tx_tender_domain_model_tender.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ],
        ]
    ]
];
