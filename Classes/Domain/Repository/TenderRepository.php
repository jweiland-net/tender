<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/tender.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Tender\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class TenderRepository
 */
class TenderRepository extends Repository
{
    /**
     * Returns the objects by the given categories
     *
     * @param array $categories
     * @return QueryResultInterface|null
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findByCategories(array $categories)
    {
        $query = $this->createQuery();

        // add storage PIDs. But not for sys_category
        // @link: https://forge.typo3.org/issues/83296
        $query->getQuerySettings()->setRespectStoragePage(false);

        return $query->matching(
            $query->in('category.uid', $categories)
        )->execute();
    }
}
