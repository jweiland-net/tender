<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\Updates;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

/**
 * UpgradeWizard to update categories of old column "category" to "categories"
 */
class RenameCategoryToCategoriesUpdateWizard implements UpgradeWizardInterface
{
    /**
     * @return string Unique identifier of this updater
     */
    public function getIdentifier(): string
    {
        return 'tenderRenameCategoryToCategories';
    }

    /**
     * @return string Title of this updater
     */
    public function getTitle(): string
    {
        return 'Migrate all tender categories from old column category to categories';
    }

    /**
     * @return string Longer description of this updater
     */
    public function getDescription(): string
    {
        return 'Migrate all tender categories from old column category to categories';
    }

    /**
     * @return bool True if there are records to update
     */
    public function updateNecessary(): bool
    {
        return (bool)$this->getQueryBuilderForOldCategoryRecords()
            ->count('*')
            ->execute()
            ->fetchColumn(0);
    }

    /**
     * Performs the configuration update.
     *
     * @return bool
     */
    public function executeUpdate(): bool
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('tx_tender_domain_model_tender');
        $queryBuilder
            ->update('tx_tender_domain_model_tender')
            ->set(
                'categories',
                $queryBuilder->quoteIdentifier('category'),
                false
            )
            ->execute();

        $connection = $this->getConnectionPool()->getConnectionForTable('sys_category_record_mm');
        $connection->update(
            'sys_category_record_mm',
            [
                'fieldname' => 'categories'
            ],
            [
                'tablenames' => 'tx_tender_domain_model_tender',
                'fieldname' => 'category'
            ]
        );

        return true;
    }

    protected function getQueryBuilderForOldCategoryRecords(): QueryBuilder
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('sys_category_record_mm');
        $queryBuilder->getRestrictions()->removeAll();
        $queryBuilder
            ->from('sys_category_record_mm')
            ->where(
                $queryBuilder->expr()->eq(
                    'fieldname',
                    $queryBuilder->createNamedParameter('category', \PDO::PARAM_STR)
                ),
                $queryBuilder->expr()->eq(
                    'tablenames',
                    $queryBuilder->createNamedParameter('tx_tender_domain_model_tender', \PDO::PARAM_STR)
                )
            );

        return $queryBuilder;
    }

    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }

    /**
     * @return string[] All new fields and tables must exist
     */
    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class
        ];
    }
}
