<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\Updates;

use TYPO3\CMS\Install\Updates\BackendLayoutIconUpdateWizard;

/**
 * Class TenderMediaFilesUpdateWizard
 */
class TenderMediaFilesUpdateWizard extends BackendLayoutIconUpdateWizard
{
    /**
     * Table to migrate records from
     *
     * @var string
     */
    protected $table = 'tx_tender_domain_model_tender';

    /**
     * Table field holding the migration to be
     *
     * @var string
     */
    protected $fieldToMigrate = 'mediafiles';

    /**
     * the source file resides here
     *
     * @var string
     */
    protected $sourcePath = 'uploads/tx_tender/';

    /**
     * target folder after migration
     * Relative to fileadmin
     *
     * @var string
     */
    protected $targetPath = '_migrated/tx_tender/';

    /**
     * @return string Unique identifier of this updater
     */
    public function getIdentifier(): string
    {
        return 'tenderUpdateMediaFilesToFal';
    }

    /**
     * @return string Title of this updater
     */
    public function getTitle(): string
    {
        return 'Migrate all file relations from tx_tender_domain_model_tender.mediafiles to sys_file_references';
    }

    /**
     * @return string Longer description of this updater
     */
    public function getDescription(): string
    {
        return 'This update wizard goes through all files that are referenced in the'
            . ' tx_tender_domain_model_tender.mediafiles field and adds the files to the FAL File Index.'
            . ' It also moves the files from uploads/ to the fileadmin/_migrated/ path.';
    }
}
