<?php
declare(strict_types=1);
namespace JWeiland\Tender\Domain\Repository;

/*
 * This file is part of the tender project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class TenderRepository
 *
 * @package JWeiland\Tender\Domain\Repository
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

        return $query->matching(
            $query->in('category.uid', $categories)
        )->execute();
    }
}
